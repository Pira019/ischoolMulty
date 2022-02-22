<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class SearchStudentRequest extends FormRequest
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

            'rechechePar' => 'required',
            'matricule' => 'required_if:rechechePar,matricule',
            'nom' => 'required_if:rechechePar,nom|max:255',
            'prenom' => 'required_if:rechechePar,prenom|max:255',
            'filiere' => 'required_if:rechechePar,filiere',
            'classe' => 'required_if:rechechePar,classe',





            //
        ];
    }
}
