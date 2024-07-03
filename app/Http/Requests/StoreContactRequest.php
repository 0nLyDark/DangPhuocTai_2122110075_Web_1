<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|size:10',
            'title' => 'required',
            'content' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' =>'Vui lòng nhập họ tên!',
            'email.required' =>'Email không được để trống!',
            'email.email' =>'Email không hợp lệ!',
            'phone.required' =>'Vui lòng nhập số điện thoại !',
            'phone.size' =>'Số điện thoại không hợp lệ!',
            'title.required' =>'Vui lòng nhập tiêu đề !',
            'content.required' =>'Vui lòng nhập nội dung !',
        ];
    }
}
