<?php

namespace App\Http\Requests\Idea;

use Illuminate\Foundation\Http\FormRequest;

class IdeaUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => 'required|string|min:3|max:240',
        ];
    }
}
