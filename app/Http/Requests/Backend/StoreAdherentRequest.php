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

                    'dossier' =>'string',
                    'juridic_form_id' =>'required|string',
                    'statu_id' =>'required|string',
                    'region_id' =>'required|string',
                    'city_id' =>'required|string',
                    'country_id' =>'required|string',
                    'sector_id' =>'required|string',
                    'activity_id' =>'required|string',
                    'description' =>'string',
                    'tel1'=>'numeric',

             ];

    }
}
