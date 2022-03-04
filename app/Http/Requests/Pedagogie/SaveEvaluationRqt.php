<?php

namespace App\Http\Requests\Pedagogie;

use Illuminate\Foundation\Http\FormRequest;

class SaveEvaluationRqt extends FormRequest
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
            'code_etudiant' => 'array',
            'cc1' => 'nullable|array'
        ];
    }
}
