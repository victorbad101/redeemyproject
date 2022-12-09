<?php

declare(strict_types=1);

namespace App\Modules\Auth\Services;

use App\Modules\Auth\Data\UserRegisterData;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Requests\UserRegisterRequest;

class UserRegisterService
{
    public function register(User $user, UserRegisterData $data, UserRegisterRequest $request): User
    {
        return $user::register($data::fromRequest($request));
    }
}