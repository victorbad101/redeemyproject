<?php

declare(strict_types=1);

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Data\SessionData;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Services\UserLoginService;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LogInController extends Controller
{
    public function __construct(
        protected UserLoginService $loginService,
    ) {
    }

    public function create(): View
    {
        return View('login.create');
    }

    public function store(User $user, SessionData $data)
    {
        try {

        } catch (ValidationException $exception) {
            echo $exception->getMessage();
        }
    }
}