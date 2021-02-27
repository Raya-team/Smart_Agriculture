<?php

namespace App\Http\Requests;

use App\Rules\Security;
use Illuminate\Foundation\Http\FormRequest;

class LandRequest extends FormRequest
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
            'name'=>['required','min:3',new Security()],
            'user_id'=>['required', new Security()],
            'points'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'points.required' => 'نقشه باید ترسیم شود',
        ];
    }
}
