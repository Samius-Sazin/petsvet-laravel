<?php

namespace App\Models\Qna;

use Illuminate\Database\Eloquent\Model;

class QnaCategory extends Model
{
    protected $table = 'qna_categories';

    protected $fillable = [
        'name'
    ];

    public function questions()
    {
        return $this->hasMany(QnaQuestion::class, 'category_id');
    }
}
