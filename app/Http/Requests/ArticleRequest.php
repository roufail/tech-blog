<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Response;




class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return [
            'title' => 'required|min:3',
            'body' => 'required|min:5',
       ];
    }

    public function failedValidation(Validator $validator)
    {
        $data = [
            'message' => $validator->errors(),
            'status'  => false,
            'data'    => []
        ];
        $response = Response::json($data,500);
        throw new ValidationException($validator,$response);
    }
}
