<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRentalDataRequest extends FormRequest
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
            'refImmobile' => 'min:5',
            'typeRentalUser' => 'min:5',
            'finality' => 'min:5',
            'warrantyType' => 'min:5',
            'proposedValue' => 'min:5',
            'currentCondominiumValue' => 'min:5',
            'iptu' => 'min:5',
            'ps' => 'min:5',
            'user_id' => 'numeric',
        ];
    }
}
