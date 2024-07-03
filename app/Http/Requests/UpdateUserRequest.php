<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:user,email,'.$this->id,
            'phone' => 'required|size:10|unique:user,phone,'.$this->id,
            'username' => 'required|min:6',
            'password' => 'sometimes|nullable|min:6',
            'password_re' => 'required_with:password|same:password',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' =>'Tên người dùng không được để trống!',
            'email.required' =>'Email không được để trống!',
            'email.email' =>'Email không hợp lệ!',
            'email.unique' =>'Email đã tồn tại!',
            'phone.required' =>'Số điện thoại không được để trống!',
            'phone.size' =>'Số điện thoại không hợp lệ!',
            'phone.unique' =>'Số điện thoại đã tồn tại!',
            'username.required' =>'Tên tài khoàn không được để trống!',
            'username.min' =>'Tên tài khoàn phải có ít nhất 6 ký tự!',
            // 'password.required' =>'Mật khẩu không được để trống!',
            'password.min' =>'Mật khẩu phải có ít nhất 6 ký tự!',
            'password_re.required_with' =>'Xác nhận mật khẩu không được để trống!',
            'password_re.same' =>'Mật khẩu xác thực không khớp !',

        ];
    }
}
