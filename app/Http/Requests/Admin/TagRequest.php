<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'slug' => 'required|min:3|max:100|unique:tags',
            'description' => 'required|min:5',
            'keywords' => 'required|min:5',
        ];

        if($this->tag) {
            $rules['slug'] = 'required|min:3|max:100|unique:tags,id,'.$this->tag->id;
        }

        return $rules;
    }
}
