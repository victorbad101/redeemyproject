<?php

declare(strict_types=1);

namespace App\Modules\Redeemy\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VinylRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:vinyls']
        ];
    }
}
