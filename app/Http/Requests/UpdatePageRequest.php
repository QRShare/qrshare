<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'sometimes|required|string|max:255|unique:pages,slug,'.$this->route('page')->id,
            'is_active' => 'boolean',
            'user_id' => 'required|exists:users,id',
            'date' => 'nullable|date',
            'images' => 'nullable|array',
        ];
    }
}
