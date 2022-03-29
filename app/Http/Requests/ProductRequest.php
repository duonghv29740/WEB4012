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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:32',
            'description' => 'min:6',
            'short_description' => 'min:6|max:1000',
            'price' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'thumbnail_url' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên phải từ 6 ký tự trở lên',
            'name.max' => 'Tên tối đa có 32 ký tự',
            'description.min' => 'Mô tả tối thiểu 6 ký tự',
            'status.required' => 'Trạng thái không được để trống',
            'short_description.required' => 'Mô tả ngắn không được để trống'
        ];
    }
}
