<?php

namespace App\Http\Requests\Qna;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question_id' => 'required|exists:qna_questions,id',
            'guest_name'  => 'nullable|max:255',
            'body'        => 'required',
        ];
    }
}
