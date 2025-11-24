<?php

namespace App\Models\Qna;

use Illuminate\Database\Eloquent\Model;

class QnaAnswer extends Model
{
    protected $table = 'qna_answers';

    protected $fillable = [
        'question_id',
        'guest_name',
        'body',
        'recommended_count'
    ];

    public function question()
    {
        return $this->belongsTo(QnaQuestion::class, 'question_id');
    }
}
