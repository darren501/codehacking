<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            //
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'is_active' => 'required',
            'role_id' => 'required',
        ];
    }

     /**
     * Adjust validation messages
     *
     * @return array
     */
    public function messages(){
        return [
            'role_id.required' => 'Please select status of the user.',
        ];
    }

  
}


