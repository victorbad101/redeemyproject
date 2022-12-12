<?php

namespace App\Modules\Auth\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Modules\Auth\Data\UserRegisterData;
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
     * @param UserRegisterData $data
     * @return static
     */
    public static function register(UserRegisterData $data): static
    {
        $user = new User();

        $user->name     = $data->name;
        $user->email    = $data->email;
        $user->password = Hash::make($data->password);
        $user->is_admin = $data->isAuthor;

        $user->save();

        return $user;
    }

    /**
     * @return HasMany
     */
    public function vinyl(): HasMany
    {
        return $this->hasMany(Vinyl::class, 'user_id');
    }

    /**
     * Used In @class CheckIfAuthor
     * @return User|null
     */
    public function isAdmin(): User|null
    {
        $admin = Vinyl::firstwhere('user_id', auth()->id());

        if ($admin) {
            return $admin
                ->author()
                ->where('is_admin', true)
                ->first();
        }

        return null;
    }
}
