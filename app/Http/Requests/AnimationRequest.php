<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimationRequest extends FormRequest
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
            'name' => 'required|unique:App\Models\Animation,name',
            'slug' => 'required',
            'status' => 'required',

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
            'name' => 'Tên Animation',
            'slug' => 'Slug',
            'status' =>'Status',
        ];
    }
}
