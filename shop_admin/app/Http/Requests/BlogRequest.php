<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
      'title' => 'required',
      'image' => 'image|mimes:png,jpg,jpef|max:2048|nullable',
      'description' => 'required|min:25',
      'content' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'required' => ':attribute không thể để trống',
      'image' => ':attribute là hình ảnh',
      'mimes' => ':attribute là hình ảnh',
      'max' => ':attribute lớn nhất là :max',
      'min' => ':attribute nhỏ nhất là :min',
    ];
  }

  public function attributes()
  {
    return [
      //
    ];
  }
}
