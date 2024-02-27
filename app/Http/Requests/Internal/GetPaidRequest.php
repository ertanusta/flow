<?php

namespace App\Http\Requests\Internal;

use Illuminate\Foundation\Http\FormRequest;

class GetPaidRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'userId' => 'required',
            'cost' => 'required|float',
            'processId' => 'required'
        ];
    }
}
