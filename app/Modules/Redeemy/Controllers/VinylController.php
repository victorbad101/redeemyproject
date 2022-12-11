<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Modules\Redeemy\Models\Vinyl;
use Illuminate\Http\RedirectResponse;
use App\Modules\Redeemy\Data\VinylData;
use App\Modules\Redeemy\Requests\VinylRequest;
use App\Modules\Redeemy\Services\VinylRegisterService;

class VinylController extends Controller
{
    public function __construct(
        public VinylRegisterService $registerService,
    ) {
    }

    public function index(): View
    {
        return View('vinyl.index', [
            'vinyls' => Vinyl::all()
        ]);
    }

    public function create(): View
    {
        return View('vinyl.create');
    }

    public function store(Vinyl $vinyl, VinylData $data, VinylRequest $request): RedirectResponse
    {
        $this->registerService->register($vinyl, $data, $request);

        return redirect('/dashboard');
    }
}
