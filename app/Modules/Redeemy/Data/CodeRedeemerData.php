<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Data;

use App\Modules\Redeemy\Requests\CodeRedeemerRequest;
use Spatie\LaravelData\Data;

class CodeRedeemerData extends Data
{
    public function __construct(
        public ?string $downloadCode
    ) {
    }

    public static function fromRequest(CodeRedeemerRequest $request): static
    {

        return new self(
            $request->download_code
        );
    }
}