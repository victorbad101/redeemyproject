<?php

declare(strict_types=1);

namespace App\Modules\Auth\Services;

use App\Modules\Auth\Data\UserRegisterData;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Requests\UserRegisterRequest;

class UserRegisterService
{
    /**
     * @param UserRegisterRequest $request
     * @return User
     */
    public function register(UserRegisterRequest $request): User
    {
        return User::register(UserRegisterData::fromRequest($request));
    }
}