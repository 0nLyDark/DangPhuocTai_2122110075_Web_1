<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'name' => 'required_with:createCustom',
            'link' => 'required_with:createCustom',

            //
        ];
    }
    public function messages(): array
    {
        return [
            'name.required_with' =>'Tên menu không được để trống!',
            'link.required_with' =>'Đường dẫn không được để trống!',
        ];
    }
}
