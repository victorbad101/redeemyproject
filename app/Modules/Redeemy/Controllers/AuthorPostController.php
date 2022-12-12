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
    public function __construct(
        private VinylRegisterService $registerService,
    ) {
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