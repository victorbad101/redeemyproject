<?php

declare(strict_types=1);

namespace App\Modules\Auth\Data;

use Spatie\LaravelData\Data;

class SessionData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {
    }

    public static function rules(): array
    {
        return [
            'name'  => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required']
        ];
    }
}