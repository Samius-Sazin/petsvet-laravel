<?php

namespace App\Http\Controllers\Qna;

use App\Http\Controllers\Controller;
use App\Http\Requests\Qna\StoreAnswerRequest;
use App\Models\Qna\QnaAnswer;
use App\Models\Qna\QnaQuestion;

class QnaAnswerController extends Controller
{
    public function store(StoreAnswerRequest $request)
    {
        $answer = QnaAnswer::create($request->validated());

        // increment answer count
        QnaQuestion::where('id', $request->question_id)
            ->increment('answer_count');

        return back()->with('success', 'Answer posted successfully!');
    }
}
use app\Http\Controllers\qna\QnaQuestionController;
use app\Http\Controllers\qna\QnaAnswerController;

Route::prefix('qna')->name('qna.')->group(function () {
    
    Route::get('/', [QnaQuestionController::class, 'index'])->name('index');

    Route::post('/ask', [QnaQuestionController::class, 'store'])->name('ask');

    Route::get('/question/{id}', [QnaQuestionController::class, 'show'])->name('show');

    Route::post('/answer', [QnaAnswerController::class, 'store'])->name('answer');

});
