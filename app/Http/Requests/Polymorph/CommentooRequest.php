<?php
declare(strict_types=1);

namespace App\Http\Requests\Polymorph;

use Illuminate\Foundation\Http\FormRequest;

class CommentooRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body' => ['required'],
            'commentable_id' => ['required', 'integer'],
            'commentable_type' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
