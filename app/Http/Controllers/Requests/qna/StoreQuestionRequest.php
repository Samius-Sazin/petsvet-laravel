<?php

namespace App\Http\Requests\Qna;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:qna_categories,id',
            'title'       => 'required|max:255',
            'body'        => 'required',
            'guest_name'  => 'nullable|max:255',
            'guest_email' => 'nullable|email|max:255',
        ];
    }
}
