<?php

namespace App\Http\Requests\Backend\Specialists;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FilterStringRule;

class UpdateSpecialistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-specialist');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>['string','required', new FilterStringRule],
            'status'=>['numeric','required','not_in:0'],
        ];
    }
}
