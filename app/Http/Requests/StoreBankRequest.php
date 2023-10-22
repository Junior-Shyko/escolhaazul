<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBankRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_bank' => 'min:2|max:60',
            'phone_manager' => 'celular_com_ddd',
            'email_manager' => 'email:rfc,dns',
            'client_since' => 'date',
            'credit_approved' => 'decimal:2',
            'limit_credit_card1' => 'decimal:2',
            'limit_credit_card2' => 'decimal:2',
            'value_application1' => 'decimal:2',
            'value_application2' => 'decimal:2'
        ];
    }
}
