<?php

namespace App\Http\Controllers;

use App\Models\QnaCategory;
use App\Models\QnaQuestion;
use App\Models\QnaAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

class QnaController extends Controller
{
    /**
     * Display QnA Page
     */
    public function index(Request $request)
    {
        $query = QnaQuestion::with(['category', 'user', 'answers.user']);
        
        if ($request->has('user_id')) {
        $query->where('user_id', $request->user_id);
           }
        // Filter by Category
        if ($request->has('category') && $request->category != 'all' && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Sorting Logic
        if ($request->has('sort')) {
            if ($request->sort == 'top') {
                $query->orderBy('upvotes', 'desc'); 
            } elseif ($request->sort == 'old') {
                $query->oldest(); 
            } else {
                $query->latest(); 
            }
        } else {
            $query->latest(); 
        }

        $questions = $query->paginate(10)->withQueryString();
        $categories = QnaCategory::withCount('questions')->get();

        return view('pages.qna', compact('questions', 'categories'));
    }

    /**
     * Store Question (Updated with try-catch like teammate)
     */
    public function storeQuestion(Request $request)
    {
        try {
            // 1. Transaction Start
            DB::beginTransaction();

            // 2. Validation
            $request->validate([
                'title' => 'required|max:255',
                'body' => 'required',
                'category_id' => 'required|exists:qna_categories,id',
            ]);

            // 3. Create Data
            QnaQuestion::create([
                'user_id' => Auth::id(), 
                'category_id' => $request->category_id,
                'title' => $request->title,
                'body' => $request->body,
                'guest_name' => $request->guest_name,
                'guest_email' => $request->guest_email,
            ]);

            // 4. Commit Transaction
            DB::commit();

            return redirect()->route('qna.index')->with('success', 'Your question has been posted successfully! 🐾');

        } catch (\Exception $e) {
            // Error হলে Rollback
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Store Answer (Updated with try-catch)
     */
    public function storeAnswer(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'question_id' => 'required|exists:qna_questions,id',
                'body' => 'required',
            ]);

            QnaAnswer::create([
                'question_id' => $request->question_id,
                'user_id' => Auth::id(),
                'responder_name' => Auth::user()->name ?? 'Vet Staff',
                'body' => $request->body,
            ]);

            // Increment answer count
            $question = QnaQuestion::find($request->question_id);
            $question->increment('answer_count');

            DB::commit();

            return redirect()->back()->with('success', 'Professional answer posted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to post answer: ' . $e->getMessage());
        }
    }

    // Upvote Logic
    public function upvote($id)
    {
        try {
            $question = QnaQuestion::findOrFail($id);
            $question->increment('upvotes');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    // Delete Logic
    public function destroy($id)
    {
        try {
            $question = QnaQuestion::findOrFail($id);

            // Authorization Check
            if (Auth::id() !== $question->user_id && !Auth::user()->isAdmin()) {
                return redirect()->back()->with('error', 'Unauthorized access.');
            }

            $question->delete();

            return redirect()->back()->with('success', 'Question deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete: ' . $e->getMessage());
        }
    }
}