<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTasks extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:25',
            'descript' => 'required|max:25'
        ];
    }
    public function messages()
    {
        return [
            'required' => trans('message.required', ['attribute' => 'name']),
            'max' => trans('message.max', ['attribute' => 'name']),
        ];
    }

}
