<?php

namespace App\Http\Requests\Abscence;

use Illuminate\Foundation\Http\FormRequest;

class SaveAbscentRequest extends FormRequest
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

        $todayDate = date('d/m/Y');


        return [

            'seance' => 'required|',
            'code_etudiant' => 'required|array',
        ];
    }
}