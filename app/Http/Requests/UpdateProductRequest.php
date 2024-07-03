<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'description' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'qty' => 'required',
            // 'image' => 'required',
            'brand_id' => 'min:1',
            'category_id' => 'min:1',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' =>'Tên sản phẩm không được để trống!',
            'price.required' =>'Giá sản phẩm không được để trống!',
            'qty.required' =>'Số lượng sản phẩm không được để trống!',
            'description.required' =>'Mô tả sản phẩm không được để trống!',
            'detail.required' =>'Chi tiết sản phẩm không được để trống!',
            // 'image.required' =>'Hình ảnh sản phẩm không được để trống!',
            'brand_id.min' =>'Chưa chọn thương hiệu!',
            'category_id.min' =>'Chưa chọn danh mục!',
        ];
    }
}
