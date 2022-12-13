<?php

declare(strict_types=1);

namespace App\Modules\Auth\Data;

use App\Modules\Auth\Requests\UserLoginRequest;
use Spatie\LaravelData\Data;

class UserLoginData extends Data
{
    /**
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $email,
        public string $password
    ) {
    }

    /**
     * @param UserLoginRequest $request
     * @return static
     */
    public static function fromRequest(UserLoginRequest $request): static
    {
        return new self(
            $request->email,
            $request->password,
        );
    }
}