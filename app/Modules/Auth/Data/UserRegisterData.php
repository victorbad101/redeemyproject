<?php

declare(strict_types=1);

namespace App\Modules\Auth\Data;

use App\Modules\Auth\Requests\UserRegisterRequest;
use Spatie\LaravelData\Data;

class UserRegisterData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public ?bool $isAuthor = false
    ) {
    }

    public static function fromRequest(UserRegisterRequest $request): static
    {
        return new self(
            $request->name,
            $request->email,
            $request->password,
            $request->is_admin === 'true' ? true : false
        );
    }
}
