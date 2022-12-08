<?php

declare(strict_types=1);

namespace App\Modules\Auth\Services;

use App\Modules\Auth\Data\UserData;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Requests\UserRequest;

class UserRegisterService
{
    public function register(User $user, UserData $data, UserRequest $request): User
    {
        return $user::register($data::fromRequest($request));
    }
}