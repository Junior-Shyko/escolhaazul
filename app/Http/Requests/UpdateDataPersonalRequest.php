<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateDataPersonalRequest extends FormRequest
{
    use \App\Http\Traits\RequestValidate;
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
            'sex' => 'min:3',
            'birthDate' => 'date',
            'organConsignor' => 'string|min:3',
            'cpf' => 'string|min:11|cpf',
            // 'nationality' => 'string|min:3',
            // 'EducationLevel' => 'string|min:3',            
            // 'user_id' => 'numeric',
            // 'identity' => 'string|min:3',            
            // 'naturality' => 'string|min:3',            
            // 'maritalStatus' => 'string|min:3',            
            // 'number_dependents' => 'string'
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
            'cpf.min' => 'O CPF não é válido',
            'birthDate.date' => 'Data de Nascimento tem que ser uma data válida',
            'organConsignor.min' => 'O orgão Emissor tem que ter no mínimo 3 caracteres'
        ];
    }

}
