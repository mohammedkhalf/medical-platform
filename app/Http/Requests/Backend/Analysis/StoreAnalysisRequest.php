<?php

namespace App\Http\Requests\Backend\Analysis;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FilterStringRule;

class StoreAnalysisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-analysis');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>['string',new FilterStringRule],
            'status'=>['numeric','integer','not_in:0'],
        ];
    }
}
