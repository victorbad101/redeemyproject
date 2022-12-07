<?php
declare(strict_types=1);

namespace App\Modules\Auth\Services;

use App\Modules\Auth\Data\SessionData;
use App\Modules\Auth\Models\User;

class UserRegisterService
{
    public function register(User $user, SessionData $data): User
    {
        return $user->create($data->toArray());
    }
}