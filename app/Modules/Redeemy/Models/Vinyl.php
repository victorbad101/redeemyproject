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

    public static function register(VinylData $data): Vinyl
    {
        $vinyl = new Vinyl();

        $vinyl->user_id       = auth()->user()->id;
        $vinyl->name          = $data->name;
        $vinyl->slug          = strtolower(str_replace(' ', '-', $vinyl->name));
        $vinyl->download_code = $vinyl->downloadCode(6);

        $vinyl->save();

        return $vinyl;
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    private function downloadCode(int $length): string
    {
        return substr(str_shuffle(strtoupper("qwertyuiopasdfghjklzxcvbnm1234567890")), 0, $length);
    }
}
