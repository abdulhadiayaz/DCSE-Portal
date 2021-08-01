<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            //
            'category_id' => 'required',
            'title' => 'required|min:10',
            'description' => 'required',
            'roles' => 'required',
            'position' => 'required',
            'address' => 'required',
            'type' => 'required',
            'deadline' => 'required',
            'status' => 'required',
            'number_of_vacancy' => 'required|numeric',
            'experience' => 'required|numeric',
        ];
    }
}
