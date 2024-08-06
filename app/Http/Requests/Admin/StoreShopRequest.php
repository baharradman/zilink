<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'title' => 'required|max:120|min:2',
                'description' => 'required|max:500|min:5',
                'address'=>'required|max:255',
                'profile_image' => 'required',
                'status' => 'required|numeric|in:0,1',
            ];
        }
        else{
            return [
                'title' => 'required|max:120|min:2',
                'description' => 'required|max:500|min:5',
                'address'=>'required|max:255',
                'profile_image' => '',
                'status' => 'required|numeric|in:0,1',
            ];
        }
    }
}
