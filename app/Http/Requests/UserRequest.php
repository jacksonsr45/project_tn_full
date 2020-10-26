<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'              => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255',
                                    Rule::unique('users', 'email')
                                    ->ignore($this->user),
                                   ],
            'password'          => ['string', 'min:8'],
            'phone'             => ['required', 'string', 'max:15'],
            'mobile_phone'      => ['required', 'string', 'max:15'],
            'description'       => ['required', 'string', 'max:255'],
            'function'          => ['required', 'string', 'max:255'],
            'state_id'          => ['required'],
            'city_id'           => ['required'],
            'address'           => ['required'],
            'number'            => ['required'],
            'neighborhood'      => ['required', 'string', 'max:255'],
            'complement'        => ['required', 'string', 'max:255'],
            'zip_code'          => ['required']
        ];
    }
}
