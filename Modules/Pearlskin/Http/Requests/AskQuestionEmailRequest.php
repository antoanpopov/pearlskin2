<?php

namespace Modules\Pearlskin\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class AskQuestionEmailRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'names' => 'required',
            'email' => 'required',
            'message' => 'required',
        ];
    }

    public function authorize()
    {
        return false;
    }
    
}
