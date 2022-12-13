<?php
declare(strict_types=1);

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rcf:dns'],
            'password' => ['required']
        ];
    }
}