<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Data;

use Spatie\LaravelData\Data;
use App\Modules\Redeemy\Requests\VinylRequest;

class VinylData extends Data
{
    /**
     * @param string $name
     */
    public function __construct(
        public string $name,

    ) {
    }

    /**
     * @param VinylRequest $request
     * @return static
     */
    public static function fromRequest(VinylRequest $request): static
    {
        return new self(
            $request->name,
        );
    }
}
