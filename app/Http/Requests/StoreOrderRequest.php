<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'delivery_name' => 'required',
            'delivery_email' => 'required|email:rfc,dns',
            'delivery_phone' => 'required|size:10',
            'delivery_address' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'delivery_name.required' =>'Họ tên không được để trống!',
            'delivery_email.required' =>'Email không được để trống!',
            'delivery_email.email' =>'Email không hợp lệ!',
            'delivery_phone.required' =>'SĐT không được để trống!',
            'delivery_phone.size' =>'Số điện thoại không hợp lệ!',
            'delivery_address.required' =>'Địa chỉ không được để trống!',
        ];
    }
}
