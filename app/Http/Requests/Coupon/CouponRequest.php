<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'number' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'number.required' => 'Vui lòng nhập số % hoặc tiền',
            'start_date.required' => 'Vui lòng nhập ngày bắt đầu',
            'end_date.required' => 'Vui lòng nhập ngày kết thúc'
        ];
    }
}