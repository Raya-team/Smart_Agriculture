<?php

namespace App\Http\Requests;

use App\Rules\Security;
use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'name' => ['required', new Security(), 'unique:filters'],
            'nickname' => ['required', new Security()],
            'min' => ['required', 'numeric', new Security()],
            'max' => ['required', 'numeric', new Security(),'min:'],
            'colors' => ['required']
        ];
    }
}
