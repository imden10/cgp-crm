<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
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
            'firstname'  => 'required|max:50',
            'lastname'   => 'required|max:50',
            'middlename' => 'max:50',
            'email'      => 'required|email:filter|max:50',
            'phone'      => 'max:20',
            'address'    => 'max:191',
            'company_id' => 'exists:companies,id'
        ];
    }
}
