<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ForAutentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255', 'unique:for_autents'],
            'password' => ['required', 'string', Password::min(8)->numbers()->letters()],
            'remember_me' => ['nullable', 'boolean', 'max:100'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
