<?php

declare(strict_types=1);

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name'     => ['required'],
            'email'    => ['required', 'email:rfc,dns', 'unique:users'],
            'password' => ['required']
        ];
    }


}