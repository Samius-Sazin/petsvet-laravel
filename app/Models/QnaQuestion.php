<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnaQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'guest_name',
        'guest_email',
        'title',
        'body',
        'upvotes',
        'answer_count'
    ];

    public function category()
    {
        return $this->belongsTo(QnaCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(QnaAnswer::class, 'question_id');
    }
}