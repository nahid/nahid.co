<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WorkEduRequest extends Request
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
            'institute'=>['required', 'min:5'],
            'address'=>['required', 'min:10'],
            'start_year'=>['different:end_year'],
            'responsibility'=>['required', 'min:3'],
            'note'=>['required', 'min:5'],
        ];
    }
}
