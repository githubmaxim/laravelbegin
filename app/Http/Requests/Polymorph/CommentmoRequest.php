<?php
declare(strict_types=1);

namespace App\Http\Requests\Polymorph;

use Illuminate\Foundation\Http\FormRequest;

class CommentmoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body' => ['required'],
            'commentmoable_id' => ['required', 'integer'],
            'commentmoable_type' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
