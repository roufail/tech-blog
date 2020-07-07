<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'content' => 'required|min:20',
            'description' => 'required|min:5',
            'keywords' => 'required|min:5',
            'categories' => 'required|array',
            'categories.*' => 'required|exists:categories,id',
            'image' => "required|mimes:jpeg,jpg,png|max:512",

        ];

        if($this->post->image != '')
            $rules['image'] = "nullable|mimes:jpeg,jpg,png|max:512";

        return $rules;
    }
}
