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
        if($this->getMethod() == "PUT")
        {
            $rules =  [
                'name'      => "required|min:3",
                'email'     => "required|email:dns", Rule::unique('users')->ignore($this->user),
            ];
        }
        elseif($this->getMethod() == "POST")
        {
            $rules = [
                'name'      => 'required|min:3',
                'email'     => 'required|email:dns|unique:users',
                'password'  => 'required|min:8|confirmed',
                'roles'     => 'required',
            ];
        }

        return $rules;
    }
}
