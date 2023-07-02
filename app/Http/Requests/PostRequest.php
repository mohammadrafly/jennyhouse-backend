<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'product_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'file|image|max:2048|mimes:jpeg,png,jpg',
            'published' => 'required|boolean',
        ];
    }
}
