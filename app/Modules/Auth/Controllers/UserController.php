<?php

declare(strict_types=1);

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Data\UserRegisterData;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Requests\UserRegisterRequest;
use App\Modules\Auth\Services\UserRegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @param UserRegisterService $registerService
     */
    public function __construct(
        private UserRegisterService $registerService,
    ) {
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return View('session.create');
    }

    /**
     * @param User $user
     * @param UserRegisterData $data
     * @param UserRegisterRequest $request
     * @return RedirectResponse
     */
    public function store(User $user, UserRegisterData $data, UserRegisterRequest $request): RedirectResponse
    {
        try {
            $authUser = $this->registerService->register($request);
            auth()->login($authUser);

            session()->regenerate();
        } catch (ValidationException $exception) {
            echo $exception->getMessage();
        }

        return redirect('/dashboard');
    }
}
