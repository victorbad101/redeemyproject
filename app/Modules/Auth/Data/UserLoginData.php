<?php
declare(strict_types=1);

namespace App\Modules\Auth\Data;

use App\Modules\Auth\Requests\UserLoginRequest;

class UserLoginData
{
    public function __construct(
        public string $email,
        public string $password
    )
    {
    }

    public static function fromRequest(UserLoginRequest $request): static
    {
        return new self(
            $request->email,
            $request->password,
        );
    }
}