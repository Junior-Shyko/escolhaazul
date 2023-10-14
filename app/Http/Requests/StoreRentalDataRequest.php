<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRentalDataRequest extends FormRequest
{
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
            'refImmobile' => 'min:5',
            'typeRentalUser' => 'min:5',
            'finality' => 'min:5',
            'term' => 'numeric',
            'warrantyType' => 'min:5',
            'proposedValue' => 'numeric',
            'currentCondominiumValue' => 'numeric',
            'iptu' => 'numeric',
            'ps' => 'min:5',
            'user_id' => 'numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    // public function messages(): array
    // {
    //     return [
    //         'name.required' => 'Nome é obrigatório',
    //         'email.required' => 'Nome é obrigatório',
    //         'email.email' => 'O Formato do E-mail está incorreto',
    //         'phone.required' => 'O número de telefone é obrigatório'
    //     ];
    // }
}
