<?php

namespace App\Http\Requests\Backend\Reservations;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FilterStringRule;

class UpdateReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-reservation');
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
            'age'=>['numeric','integer','not_in:0'],
            'phone'=>['numeric','min:11','not_in:0'],
            'clinic_id'=>['numeric','not_in:0','exists:specialties,id'],
            'price'=>['numeric','not_in:0']
        ];
    }
}
