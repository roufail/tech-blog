<?php

namespace App\Http\Requests\Admin;

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
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ];

        if($this->user){
            $rules['email'] =  'required|email|unique:users,email,'.$this->user->id;
            $rules['password'] =  'nullable|min:6';
            $rules['confirm_password'] =  'required_with:password|same:password';
        }

        return $rules;

    }
}
