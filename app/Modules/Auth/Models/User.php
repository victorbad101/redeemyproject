<?php

namespace App\Modules\Auth\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Modules\Auth\Data\SessionData;
use App\Modules\Redeemy\Models\Vinyl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    public static function register(SessionData $data)
    {
        $email = $data->email;
        $password = Hash::make($data->password);


    }

    public function vinyl(): HasMany
    {
        return $this->hasMany(Vinyl::class);
    }
}
