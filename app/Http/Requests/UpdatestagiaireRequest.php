<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatestagiaireRequest extends FormRequest
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
            'name' => 'required',
            'prenom' => 'required',
            'dateN' => 'required|date|before_or_equal:2004-01-01',
            'CIN' => 'sometimes',
            'email' => 'required|email',
            'photo' => 'image|sometimes',
            'CV' => 'image|sometimes',
            'phone' => 'required',
            'gendre' => 'required',
            'diplome' => 'sometimes',
            
        ];
    }
}
