<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'slug' => 'required|min:3|max:100|unique:pages',
            'content' => 'required|min:10',
            'description' => 'required|min:5',
            'keywords' => 'required|min:5',
        ];

        if($this->page) {
            $rules['slug'] = 'required|min:3|max:100|unique:pages,id,'.$this->page->id;
        }

        return $rules;
    }
}
