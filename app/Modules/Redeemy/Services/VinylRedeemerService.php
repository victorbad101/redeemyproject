<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Services;

use App\Modules\Redeemy\Models\Vinyl;
use Carbon\Carbon;

class VinylRedeemerService
{
    /**
     * @param $id
     * @return Vinyl
     */
    public function beforeRedeem($id): Vinyl
    {
        $vinyl = Vinyl::find($id);
        $start = Carbon::parse($vinyl->updated_at);

        if (! isset($vinyl->download_code)) {
            $vinyl->download_code = $this->downloadCode(6);
            $vinyl->expired_at = $start->addSeconds(10);
            $vinyl->save();
        }

        return $vinyl;
    }

    /**
     * @param $id
     * @return Vinyl
     */
    public function afterRedeem($id): Vinyl
    {
        $deleteCode = Vinyl::find($id)
                           ->where('download_code', '!=', null)
                           ->first();

        $deleteCode->download_code = null;
        $deleteCode->save();

        return $deleteCode;
    }

    /**
     * @param int $length
     * @return string
     */
    private function downloadCode(int $length): string
    {
        return substr(str_shuffle(strtoupper("qwertyuiopasdfghjklzxcvbnm1234567890")), 0, $length);
    }
}