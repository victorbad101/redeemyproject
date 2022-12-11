<?php
declare(strict_types=1);

namespace App\Modules\Redeemy\Services;
use App\Modules\Redeemy\Models\Vinyl;
use App\Modules\Redeemy\Data\VinylData;
use App\Modules\Redeemy\Requests\VinylRequest;

class VinylRegisterService
{
    public function register(Vinyl $vinyl, VinylData $data, VinylRequest $request): Vinyl
    {
        return $vinyl::register($data::fromRequest($request));
    }
}
