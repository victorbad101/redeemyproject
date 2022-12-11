<?php

declare(strict_types=1);

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Data\UserLoginData;
use App\Modules\Auth\Requests\UserLoginRequest;
use App\Modules\Auth\Services\UserLoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LogInController extends Controller
{
    public function __construct(
        private UserLoginService $loginService,
    ) {
    }

    public function create(): View
    {
        return View('login.create');
    }

    public function store(UserLoginData $data, UserLoginRequest $request): RedirectResponse
    {
        try {
            $this->loginService->login($data, $request);
        } catch (ValidationException $exception) {
            echo $exception->getMessage();
        }

        return redirect('/dashboard');
    }

    public function destroy(): RedirectResponse
    {
        auth()->logout();

        return redirect('/dashboard');
    }
}
