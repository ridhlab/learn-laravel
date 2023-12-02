<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Applications\Questions\QuestionCrudApplication;

class QuestionController extends Controller
{
    private QuestionCrudApplication $questionCrudApplication;

    public function __construct(QuestionCrudApplication $questionCrudApplication)
    {
        $this->questionCrudApplication = $questionCrudApplication;
    }

    function index()
    {
        $questions = $this->questionCrudApplication->fetch();
        return view('pages.question.index')->with('questions', $questions);
    }

    function create()
    {
        return view('pages.question.create');
    }

    function store(StoreQuestionRequest $request)
    {
        try {
            $this->questionCrudApplication->addQuestion(['content' => $request->input('content')]);
            return redirect()->route('question.index')->with('success', 'Question has been successfully added');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
