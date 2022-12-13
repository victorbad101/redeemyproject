<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VinylRequest extends FormRequest
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
            'name' => ['required', 'unique:vinyls'],
            'file'  => ['required', 'file']
        ];
    }
}
