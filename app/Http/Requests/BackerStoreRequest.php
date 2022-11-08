<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class BackerStoreRequest extends FormRequest
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
      'backer_type_id' => 'required|exists:App\Models\BackerType,id'
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
      'name.required' => [
        'field' => 'name',
        'error' => 'Name wird benötigt!'
      ],
      'backer_type_id.required' => [
        'field' => 'backer_type_id',
        'error' => 'Typ wird benötigt!'
      ],
      'backer_type_id.exists' => [
        'field' => 'backer_type_id',
        'error' => 'Typ nicht vorhandem!'
      ],
    ];
  }
}