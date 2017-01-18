<?php

namespace Modules\Pearlskin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskQuestionEmailRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:200',
            'email' => 'required|min:4|max:200',
            'message' => 'required|min:20|max:300',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function attributes(){
        return [
            'name' => trans('pearlskin::common.form.name'),
            'message' => trans('pearlskin::common.form.message'),
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('pearlskin::validation.required')
        ];
    }
}
