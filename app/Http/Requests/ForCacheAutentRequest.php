<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class ForCacheAutentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:254', 'unique:for_cache_autents'],
            'password' => ['required', 'string', \Illuminate\Validation\Rules\Password::min(8)->numbers()->letters()],
            'remember_token' => ['nullable', 'boolean', 'max:100'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
