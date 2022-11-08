<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class AnnualProgramStoreRequest extends FormRequest
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
      'periode_start' => 'required',
      'periode_end' => 'required',
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
      'periode_start.required' => [
        'field' => 'periode_start',
        'error' => 'Jahr start wird benötigt!'
      ],
      'periode_end.required' => [
        'field' => 'periode_end',
        'error' => 'Jahr ende wird benötigt!'
      ],
    ];
  }
}
