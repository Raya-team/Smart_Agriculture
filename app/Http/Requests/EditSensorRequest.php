<?php

namespace App\Http\Requests;

use App\Rules\Security;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditSensorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'serial' => ['required', new Security(),Rule::unique('sensors')->ignore($this->sensor->id)],
            'land_id' => ['required', new Security()],
        ];
    }
}
