<?php

namespace App\Http\Requests;

use App\Rules\Security;
use App\Rules\Unspace;
use App\Rules\Username;
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
            'name' => ['required',new Security()],
            'username' => ['required', 'unique:users', 'string', new Username()],
            'phone_number'=>['required','unique:users','regex:/(09)[0-9]{9}/','digits:11','numeric'],
            'image' => ['mimes:jpeg,jpg,png|file|image'],
            'password' => ['required', 'min:6'],
            'level' => ['required'],
            'password_confirmation' => ['required_with:password', 'same:password'],
        ];
    }
    public function messages()
    {
        return [
//            'name.required' => 'نام و نام خانوادگی باید وارد شود',
//            'username.required' => 'نام کاربری باید وارد شود',
//            'password_confirmation.same' => 'رمز های عبور یکسان نمباشند'
//        'image' => 'پسوند فایل معتبر نمیباشد'
        ];
    }
}
