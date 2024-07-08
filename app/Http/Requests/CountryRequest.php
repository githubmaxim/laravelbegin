<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'Code' => ['required'],
            'Name' => ['required'],
            'SurfaceArea' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
