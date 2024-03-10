<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;

class TriggerRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'applicationId' => 'required|exists:App\Models\Application,id',
            'search' => '',
        ];
    }
}
