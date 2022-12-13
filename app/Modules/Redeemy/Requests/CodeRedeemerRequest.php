<?php
declare(strict_types=1);

namespace App\Modules\Redeemy\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeRedeemerRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return \string[][]
     */
    public function rules(): array
    {
        return [
            'download_code' => ['required']
        ];
    }
}