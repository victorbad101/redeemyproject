<?php

declare(strict_types=1);

namespace App\Modules\Auth\Data;

use App\Modules\Auth\Requests\UserRegisterRequest;
use Spatie\LaravelData\Data;

class UserRegisterData extends Data
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param bool|null $isAuthor
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public ?bool $isAuthor = false
    ) {
    }

    /**
     * @param UserRegisterRequest $request
     * @return static
     */
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
