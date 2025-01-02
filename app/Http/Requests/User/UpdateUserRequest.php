<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => 'image',
            'name' => 'required|min:3|max:40',
            'bio' => 'sometimes|nullable|min:3|max:255',
        ];
    }
}
