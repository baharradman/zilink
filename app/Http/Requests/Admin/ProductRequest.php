<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|max:120|min:2',
                'summary' => 'required|max:500|min:5',
                'image' => 'required',
                'status' => 'required|numeric|in:0,1',
                'shop_id'=> 'required|integer|exists:shops,id',
                'category_id'=> 'required|integer|exists:categories,id',
                'price'=> 'required|numeric|min:0',

            ];
        } else {
            return [
                'name' => 'required|max:120|min:2',
                'summary' => 'required|max:500|min:5',
                'image' => '',
                'status' => 'required|numeric|in:0,1',
                'shop_id'=> 'required|integer|exists:shops,id',
                'category_id'=> 'required|integer|exists:categories,id',
                'price'=> 'required|numeric|min:0',
            ];
        }
    }
}
