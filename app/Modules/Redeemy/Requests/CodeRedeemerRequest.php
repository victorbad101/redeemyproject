<?php
declare(strict_types=1);

namespace App\Modules\Redeemy\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeRedeemerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'download_code' => ['required']
        ];
    }
}