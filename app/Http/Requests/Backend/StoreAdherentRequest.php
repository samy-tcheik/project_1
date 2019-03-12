<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdherentRequest extends FormRequest
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
             return  [
                 'name' =>'required|max:191',
                  'dossier' =>'string',
                  'juridic' =>'string',
                  'statu' =>'string',
                  'regime' =>'string',
                  'description' =>'string',
                  'tel1'=>'numeric',

             ];

    }
}
