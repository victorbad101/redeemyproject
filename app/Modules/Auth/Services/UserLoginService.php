<?php
declare(strict_types=1);

namespace App\Modules\Auth\Services;

use App\Modules\Auth\Data\UserLoginData;
use App\Modules\Auth\Requests\UserLoginRequest;

class UserLoginService
{
    public function login(UserLoginData $data, UserLoginRequest $request)
    {
        $collection = $data::fromRequest($request);
    }
}