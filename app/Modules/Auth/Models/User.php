<?php

namespace App\Modules\Auth\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Modules\Auth\Data\UserData;
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

    /**
     * @param UserData $data
     * @return static
     */
    public static function register(UserData $data): static
    {
        $user = new User();

        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);

        $user->save();

        return $user;
    }

    public function vinyl(): HasMany
    {
        return $this->hasMany(Vinyl::class);
    }
}
