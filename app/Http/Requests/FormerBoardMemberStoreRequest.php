<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class FormerBoardMemberStoreRequest extends FormRequest
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
      'description' => 'required',
      'former_board_member_type_id' => 'required|exists:App\Models\FormerBoardMemberType,id'
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
      'description.required' => [
        'field' => 'description',
        'error' => 'Beschreibung wird benötigt!'
      ],
      'former_board_member_type_id.required' => [
        'field' => 'former_board_member_type_id',
        'error' => 'Typ wird benötigt!'
      ],
      'former_board_member_type_id.exists' => [
        'field' => 'former_board_member_type_id',
        'error' => 'Typ nicht vorhandem!'
      ],
    ];
  }
}