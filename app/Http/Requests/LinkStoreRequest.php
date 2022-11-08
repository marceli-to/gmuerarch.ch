<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class LinkStoreRequest extends FormRequest
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
      'url' => 'required',
    ];
  }

  /**
   * Custom message for validation
   *
   * @return array
   */
  public function messages()
  {
    return [
      'title.required' => [
        'field' => 'title',
        'error' => 'Titel wird benötigt!'
      ],
      'url.required' => [
        'field' => 'url',
        'error' => 'URL wird benötigt!'
      ],
    ];
  }
}
