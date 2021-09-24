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
      'product_name' => 'required',
      'quantity' => 'required|numeric',
      'price' => 'required|numeric',
      'description' => 'required',
      'image.*' => 'image|mimes:jpg,jpeg,png,PNG,JPG,JPEG|max:1024',
      // 'status',
      'sale_price' => 'numeric|max:2|nullable',
      // 'category_id',
      // 'brand_id',
      // 'user_id'
    ];
  }

  public function messages()
  {
    return [
      // 
    ];
  }

  public function attributes()
  {
    return [

    ];
  }
}
