<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'ar_first_name' => 'required|max:30',
            'en_first_name' => 'required|max:30',
            'ar_last_name' => 'required|max:30',
            'en_last_name' => 'required|max:30',
            'ar_position'  => 'required|max:50',
            'en_position'  => 'required|max:50',
            'gender'    => 'required',
            'phone'  => 'required|min:11|max:11',
        ];
    }
}
