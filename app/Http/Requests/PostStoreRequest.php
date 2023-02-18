<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|string|unique:posts|min:4|max:50',
            'content' => 'required|min:10',
            'tags' => 'required',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'description' => 'required|string',
            'undercategories' => 'required',
            'slug' => 'string',
            'keyWords' => 'required|min:3|max:15',
            'image' => 'required|file'
        ];
    }
}
