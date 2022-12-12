<?php

namespace App\Modules\Redeemy\Models;

use App\Modules\Auth\Models\User;
use App\Modules\Redeemy\Data\VinylData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vinyl extends Model
{
    use HasFactory;

    /**
     * @param VinylData $data
     * @return Vinyl
     */
    public static function register(VinylData $data): Vinyl
    {
        $vinyl = new Vinyl();

        $vinyl->user_id       = auth()->user()->id;
        $vinyl->name          = $data->name;
        $vinyl->slug          = strtolower(str_replace(' ', '-', $vinyl->name));
        $vinyl->download_code = null;

        $vinyl->save();

        return $vinyl;
    }

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
