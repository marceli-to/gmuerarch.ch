<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class MemberStoreRequest extends FormRequest
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
      'firstname' => 'required',
      'address' => 'required',
      'zip' => 'required',
      'city' => 'required',
      'phone' => 'required',
      'email' => 'required|email',
      'type' => 'required'
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
      'name.required' => 'Vorname wird benötigt!',
      'firstname.required' => 'Vorname wird benötigt!',
      'address.required' => 'Vorname wird benötigt!',
      'zip.required' => 'PLZ wird benötigt!',
      'city.required' => 'Ort wird benötigt!',
      'phone.required' => 'Name wird benötigt!',
      'email.required' => 'E-Mail wird benötigt!',
      'email.email' => 'E-Mail ist ungültig!',
      'type.required' => 'Vorname wird benötigt!',
    ];
  }
}
