<?php

namespace App\Http\Requests\Backend\Profiles;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FilterStringRule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_name'=>['string','nullable', new FilterStringRule],
            'age'=>['numeric','not_in:0'],
            'phone_number'=>['numeric','min:11','not_in:0'],
            'diagnosis'=>['string','nullable', new FilterStringRule],
            'analysis_id'=>['numeric','nullable','not_in:0','exists:analysis,id'],
            'analysis_descrption'=>['string','nullable', new FilterStringRule],
            'first_drug_id'=>['numeric','not_in:0','exists:drugs,id'],
            'first_drug_dose'=>['numeric','not_in:0'],
            'second_drug_id'=>['numeric','nullable','not_in:0','exists:drugs,id'],
            'second_drug_dose'=>['numeric','nullable','not_in:0'],
            'third_drug_id'=>['numeric','nullable','not_in:0','exists:drugs,id'],
            'third_drug_dose'=>['numeric','nullable','not_in:0'],
        ];
    }
}
