<?php

declare(strict_types=1);

namespace App\Modules\Auth\Services;

use App\Modules\Auth\Data\UserLoginData;
use App\Modules\Auth\Requests\UserLoginRequest;
use Illuminate\Validation\ValidationException;

class UserLoginService
{
    /**
     * @param UserLoginRequest $request
     * @return void
     * @throws ValidationException
     */
    public function login(UserLoginRequest $request): void
    {
        $collection = UserLoginData::fromRequest($request)->toArray();

        if (!auth()->attempt($collection)) {
            throw ValidationException::withMessages(['Your provided credentials could not be verified']);
        }

        session()->regenerate();
    }
}