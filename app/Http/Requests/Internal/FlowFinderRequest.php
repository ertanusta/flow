<?php

namespace App\Http\Requests\Internal;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class FlowFinderRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'userId' => "required",
            'applicationId' => "required",
            'triggerId' => "required",
        ];
    }

    public function messages()
    {
        return [
            'userId.required' => "User Id is required",
            'applicationId.required' => "Application Id is required",
            'triggerId.required' => "Trigger Id is required",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }

}
