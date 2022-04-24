<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
                'title' => ['required', 'min:3', 'unique:posts'],
                'description' => ['required', 'min:10'],
                //'user_id'=>['required','exists:users,id'],
                //'image'=>['required','image','mimes:jpg,png']
        ];

    }



    public function messages()
    {
        return [
            'title.required' => 'Title Field Is Required',
            'title.min' => 'Minimun Length for Title is 3 chars',
            'title.unique'=>'Title Field Must Be Unique',
            'description.required'=>'Description Field Is Required',
            'description.min' => 'Minimun Length for Description is 10 chars',
            //'image.required' => 'Image Field Is Required',
            //'image.mimes' => 'Only Allowed Extensions Are png,jpg',
            //'user_id.exists'=>'The Selected Post Creator Not Found'
        ];
    }
}
