<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'min:8|max:20|nullable',
      'phone' => 'required',
      'address' => 'required',
      'avatar' => 'image|mimes:jpeg,bmp,png,gif|max:2048|nullable',
      'countryID' => 'required'
    ];
  }

  public function messages()
    {
      return[
        'required' => ':attribute không thể để trống',
        'email' => ':attribute phải thuộc dạng email',
        'min' => ':attribute có độ dài nhỏ nhất là :min',
        'max' => ':attribute có độ dài lớn nhất là :max',
        'mimes' => ':attribute phải là hình ảnh'
      ];
    }

    public function attributes()
    {
      return[
        'fullname' => 'Tên',
        'example-email' => 'Email',
        'password' => 'Mật khẩu',
        'phone' => 'Số điện thoại',
        'address' => 'Địa chỉ',
        'avatar' => 'Ảnh đại diện'
      ];
    }
}
