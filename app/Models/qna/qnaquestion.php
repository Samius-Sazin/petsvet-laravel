<?php

namespace App\Models\Qna;

use Illuminate\Database\Eloquent\Model;

class QnaQuestion extends Model
{
    protected $table = 'qna_questions';

    protected $fillable = [
        'category_id',
        'title',
        'body',
        'guest_name',
        'guest_email',
        'answer_count'
    ];

    public function category()
    {
        return $this->belongsTo(QnaCategory::class, 'category_id');
    }

    public function answers()
    {
        return $this->hasMany(QnaAnswer::class, 'question_id');
    }
}
