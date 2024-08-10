<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForCacheRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'context' => ['required'],
            'day_created' => ['required', 'integer'],




        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
