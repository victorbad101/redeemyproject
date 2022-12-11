<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Data;

use Spatie\LaravelData\Data;
use App\Modules\Redeemy\Requests\VinylRequest;

class VinylData extends Data
{
    public function __construct(
        public string $name
    ) {
    }

    public static function fromRequest(VinylRequest $request): static
    {
        return new self(
            $request->name
        );
    }
}
