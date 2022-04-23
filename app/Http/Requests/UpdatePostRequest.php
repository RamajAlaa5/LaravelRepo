<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => ['min:3', Rule::unique('posts')->ignore($this->id)],
            'description' => [ 'min:10'],
            'user_id'=>['exists:users,id'],
            'image'=>['image','mimes:jpg,png']
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Minimun Length for Title is 3 chars',
            'title.unique'=>'Title Field Must Be Unique',
            'description.min' => 'Minimun Length for Description is 10 chars',
            'image.mimes' => 'Only Allowed Extensions Are png,jpg',
            'user_id.exists'=>'The Selected Post Creator Not Found'
        ];
    }
}
