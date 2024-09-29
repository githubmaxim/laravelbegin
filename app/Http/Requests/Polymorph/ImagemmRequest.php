<?php
declare(strict_types=1);

namespace App\Http\Requests\Polymorph;

use Illuminate\Foundation\Http\FormRequest;

class ImagemmRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
