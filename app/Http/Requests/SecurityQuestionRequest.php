<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecurityQuestionRequest extends FormRequest
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
            'security_question1' => 'required|different:security_question2|different:security_question3',
            'security_question2' => 'required|different:security_question3',
            'security_question3' => 'required',
            'security_answer1' => 'required|different:security_answer2|different:security_answer3',
            'security_answer2' => 'required|different:security_answer3',
            'security_answer3' => 'required',
        ];
    }
}
