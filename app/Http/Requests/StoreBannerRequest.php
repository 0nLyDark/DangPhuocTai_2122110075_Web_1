<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'name' => 'required',
            'link' => 'required',
            'image' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' =>'Tên banner không được để trống!',
            'link.required' =>'Đường dẫn không được để trống!',
            'image.required' =>'Hình ảnh không được để trống!',
        ];
    }
}
