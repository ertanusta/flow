<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FlowCreateRequest extends FormRequest
{
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
            'triggerName' => 'required',
            'triggerId' => 'required',
            'triggerApplicationId' => 'required',
            'condition' => 'required',

            'actionApplicationId' => 'required',
            'actionId' => 'required',
            'context' => 'required',
        ];
    }

   public function validationData()
   {
       $validatedData = parent::validationData();
       $validatedData['userId'] = Auth::user()->id;
       $validatedData['name'] = 'testFrontEnd'; //todo: burayı frontendden besleyeceğiz
       return $validatedData;
   }
}
