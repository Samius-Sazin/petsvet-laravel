<?php

namespace App\Http\Controllers\Qna;

use App\Http\Controllers\Controller;
use App\Http\Requests\Qna\StoreQuestionRequest;
use App\Models\Qna\QnaCategory;
use App\Models\Qna\QnaQuestion;

class QnaQuestionController extends Controller
{
    public function index()
    {
        $categories = QnaCategory::all();
        $questions = QnaQuestion::with('category')->latest()->paginate(10);

        return view('pages.qna', compact('categories', 'questions'));
    }

    public function store(StoreQuestionRequest $request)
    {
        QnaQuestion::create($request->validated());

        return back()->with('success', 'Question posted successfully!');
    }

    public function show($id)
    {
        $question = QnaQuestion::with('answers')->findOrFail($id);

        return view('pages.qna-details', compact('question'));
    }
}
