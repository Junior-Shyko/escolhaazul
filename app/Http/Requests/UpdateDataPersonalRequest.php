<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateDataPersonalRequest extends FormRequest
{
    use \App\Http\Traits\RequestValidate;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $req = new UpdateDataPersonalRequest;
        $validator = new Validator;
        $req->failedValidation($validator);
        return [
            'sex' => 'min:3',
            'birthDate' => 'date',
            'identity' => 'min:5',
            'organConsignor' => 'min:5',
            'cpf' => 'min:5',
            'nationality' => 'min:5',
            'naturality' => 'min:5',
            'educationLevel' => 'min:5',
            'user_id' => 'numeric',
        ];
    }

}
