<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class CountryRequest extends FormRequest
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
      'countryName' => 'required',
    ];
  }

  public function messages()
  {
    return[
      'required' => ':attribute không thể để trống',
    ];
  }

  public function attributes()
  {
    return[
      'country' => 'Quốc gia',
    ];
  }
}
