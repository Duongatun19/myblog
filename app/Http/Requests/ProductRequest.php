<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'titleproduct' => 'required|string|min:3',
            'slugproduct' => 'required|string|min:3',
            'category_id' => 'required',
            'noidung' => 'required|string|min:3',
            'status' => 'required',
            'link' => 'required|string|min:3',

        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập (*)',
            'email' => 'phải có định dạng :attribute  vd : 123@gmail.com',
            'min' => 'Số kí tự phải lớn hơn :min',
            'unique' => ':attribute Đã Tồn Tại !',
            'confirmed' => ':attribute Nhập Lại Không Chính Xác'
        ];
    }
    public function attributes()
    {
        return [
            'titleproduct' => 'Tiêu đề',
            'slugproduct' => 'Slug',
            'category_id'=> 'Danh mục cha',
            'noidung' =>    'Nội Dung',
            'status' => 'Trạng Thái ',
            'link' => 'link',
        ];
    }
}
