<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Data;

use App\Modules\Redeemy\Requests\CodeRedeemerRequest;
use Spatie\LaravelData\Data;

class CodeRedeemerData extends Data
{
    /**
     * @param string|null $downloadCode
     */
    public function __construct(
        public ?string $downloadCode
    ) {
    }

    /**
     * @param CodeRedeemerRequest $request
     * @return static
     */
    public static function fromRequest(CodeRedeemerRequest $request): static
    {

        return new self(
            $request->download_code
        );
    }
}