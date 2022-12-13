<?php
declare(strict_types=1);

namespace App\Modules\Redeemy\Services;
use App\Modules\Redeemy\Models\Vinyl;
use App\Modules\Redeemy\Data\VinylData;
use App\Modules\Redeemy\Requests\VinylRequest;

class VinylRegisterService
{
    /**
     * @param VinylRequest $request
     * @return Vinyl
     */
    public function register(VinylRequest $request): Vinyl
    {
        return Vinyl::register(VinylData::fromRequest($request), $request);
    }
}
