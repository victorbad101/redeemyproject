<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Controllers;

use Illuminate\View\View;
use App\Modules\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Modules\Redeemy\Models\Vinyl;
use Illuminate\Http\RedirectResponse;
use App\Modules\Redeemy\Data\VinylData;
use App\Modules\Redeemy\Requests\VinylRequest;
use App\Modules\Redeemy\Services\VinylRegisterService;
use Illuminate\Support\Facades\Auth;

class VinylController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return View('vinyl.index', [
            'vinyls' => Vinyl::all(),
        ]);
    }
}
