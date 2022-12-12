<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Controllers;

use App\Console\Kernel;
use App\Http\Controllers\Controller;
use App\Modules\Redeemy\Data\CodeRedeemerData;
use App\Modules\Redeemy\Models\Vinyl;
use App\Modules\Redeemy\Requests\CodeRedeemerRequest;
use App\Modules\Redeemy\Services\VinylRedeemerService;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RedeemerController extends Controller
{
    public function __construct(
        private VinylRedeemerService $redeemerService
    ) {
    }


    public function createCode($id): View
    {
        $vinyl = Vinyl::find($id);

        if ($vinyl->updated_at->lt($vinyl->expired_at) && $vinyl->dowload_code) {
            $this->redeemerService->afterRedeem($id);
        }

        $this->redeemerService->beforeRedeem($id);

        return View('vinyl.redeem.create', [
            'post' => $vinyl
        ]);
    }

    /**
     * @param $id
     * @param CodeRedeemerData $data
     * @param CodeRedeemerRequest $request
     */
    public function removeCode($id, CodeRedeemerData $data, CodeRedeemerRequest $request)
    {
        $vinyl = Vinyl::find($id);

        if ($data::fromRequest($request)->downloadCode == $vinyl->download_code) {
            $this->redeemerService->afterRedeem($id);
            return 'redirect to downlaod vinyl';
        }

        return back()->with('failed', 'Invalid input');
    }
}