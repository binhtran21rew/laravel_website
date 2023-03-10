<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1',
            'price' => 'required|numeric',
            'image' => 'required',
            'category_id' => 'required',
            'contents' => 'required',
        ];
    }
    public function messages()
{
    return [
        'category_id.required' => 'A category is required',
        'name.min' => 'A text have at least one',
    ];
}
}
