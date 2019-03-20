<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFieldsRequest extends FormRequest
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
            'designation' =>'required|string',
            'table' => ['required' ,Rule::in(
                'status',
                'sectors',
                'regions',
                'juridic_forms',
                'countries',
                'cities',
                'activities'
                )
        ]];
    }
}
