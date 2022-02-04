<?php

namespace App\Http\Requests\Abscence;

use Illuminate\Foundation\Http\FormRequest;

class RechercheAbscentRequest extends FormRequest
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

            'sem' => 'required|digits_between:1,2|',
            'date' => 'required|before_or_equal:date',
            'fil' => 'required|',
            'cls' => 'required|',
        ];
    }
}