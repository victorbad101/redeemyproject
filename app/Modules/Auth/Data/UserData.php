<?php

declare(strict_types=1);

namespace App\Modules\Auth\Data;

use App\Modules\Auth\Requests\UserRequest;
use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {
    }

    public static function fromRequest(UserRequest $request): static
    {
        return new self(
            $request->name,
            $request->email,
            $request->password
        );
    }
}