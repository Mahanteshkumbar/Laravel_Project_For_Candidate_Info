<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HobbyCreateRequest extends Request
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
            'hname' => 'required|min:05'
        ];
    }

    //handling custom error messages 
    public function messages(){
        return [
            'hname.required' => 'Hobby is required!',
            'hname.min' => 'Hobby must be at least 05 characters.!',
        ];
    }
}
