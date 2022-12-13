<?php

namespace App\Modules\Redeemy\Models;

use App\Modules\Auth\Models\User;
use App\Modules\Redeemy\Data\VinylData;
use App\Modules\Redeemy\Requests\VinylRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vinyl extends Model
{
    use HasFactory;

    /**
     * @param VinylData $data
     * @param VinylRequest $request
     * @return Vinyl
     */
    public static function register(VinylData $data, VinylRequest $request): Vinyl
    {
        $vinyl = new static();

        $vinyl->user_id       = auth()->user()->id;
        $vinyl->name          = $data->name;
        $vinyl->slug          = strtolower(str_replace(' ', '-', $vinyl->name));
        $vinyl->vinyl_file     = $request->file('file')->store('public');
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
