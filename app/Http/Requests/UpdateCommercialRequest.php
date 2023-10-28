<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCommercialRequest extends FormRequest
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
            'cnpj' => 'cnpj|min:14',
            'phone_fixed' => 'celular_com_ddd|min:3',
            'phone_mobile' => 'celular_com_ddd|min:3',
            'email' => 'email:rfc,dns|min:3'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'cnpj.cnpj' => 'O CNPJ não é válido',
            'phone_fixed.celular_com_ddd' => 'O Formato do telefone não é válido',
            'phone_mobile.celular_com_ddd' => 'O Formato do telefone não é válido',
            'email.email' => 'O E-mail não está formatado corretamente.',
        ];
    }
}
