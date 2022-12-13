<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Redeemy\Data\CodeRedeemerData;
use App\Modules\Redeemy\Models\Vinyl;
use App\Modules\Redeemy\Requests\CodeRedeemerRequest;
use App\Modules\Redeemy\Services\VinylRedeemerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RedeemerController extends Controller
{
    /**
     * @param VinylRedeemerService $redeemerService
     */
    public function __construct(
        private VinylRedeemerService $redeemerService
    ) {
    }

    /**
     * @param $id
     * @return View
     */
    public function createCode($id): View
    {
        $vinyl = Vinyl::find($id);

        if (! isset($vinyl->download_code_count)) {
            $this->redeemerService->afterRedeem($id);
        }

        if (! isset($vinyl->download_code)) {
            $this->redeemerService->beforeRedeem($id);
        }

        return View('vinyl.redeem.create', [
            'post' => $vinyl
        ]);
    }

    /**
     * @param $id
     * @param CodeRedeemerData $data
     * @param CodeRedeemerRequest $request
     * @return RedirectResponse
     */
    public function removeCode($id, CodeRedeemerData $data, CodeRedeemerRequest $request)
    {
        $vinyl = Vinyl::find($id);

        if ($data::fromRequest($request)->downloadCode == $vinyl->download_code && $vinyl->download_code_count) {
            $vinyl->download_code_count--;
            $vinyl->save();
            return back();
        }

        if (! $vinyl->download_code_count) {
            $this->redeemerService->afterRedeem($id);
        }

        return back();
    }
}