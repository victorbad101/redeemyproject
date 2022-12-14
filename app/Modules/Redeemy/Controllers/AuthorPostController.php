<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Redeemy\Data\VinylData;
use App\Modules\Redeemy\Models\Vinyl;
use App\Modules\Redeemy\Requests\VinylRequest;
use App\Modules\Redeemy\Services\VinylRegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorPostController extends Controller
{
    /**
     * @param VinylRegisterService $registerService
     */
    public function __construct(
        private VinylRegisterService $registerService,
    ) {
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return View('vinyl.create');
    }

    /**
     * @param Vinyl $vinyl
     * @param VinylData $data
     * @param VinylRequest $request
     * @return RedirectResponse
     */
    public function store(VinylRequest $request): RedirectResponse
    {
        $this->registerService->register($request);

        return redirect('/dashboard');
    }
}