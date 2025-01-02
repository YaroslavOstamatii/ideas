<?php

namespace App\Http\Requests\Idea;

use Illuminate\Foundation\Http\FormRequest;

class IdeaStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'idea_content' => 'required|string|min:3|max:240'
        ];
    }

//    /**
//     * Prepare the data for validation.
//     *
//     * @return void
//     */
//    protected function prepareForValidation(): void
//    {
//        $this->merge([
//            'content' => Str::lower($this->get('content')),
//        ]);
//    }
//
//    /**
//     * Get custom messages for validator errors.
//     *
//     * @return array
//     */
//    public function messages(): array
//    {
//        return [
//            'content.required' => __('validation.required'),
//            'content.min' => __('validation.min'),
//        ];
//    }
}
