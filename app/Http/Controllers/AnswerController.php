<?php

namespace App\Http\Controllers;

use App\Applications\Answers\AnswerCrudApplication;
use App\Applications\Questions\QuestionCrudApplication;
use App\Http\Requests\StoreAnswerRequest;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    protected QuestionCrudApplication $questionCrudApplication;
    protected AnswerCrudApplication $answerCrudApplication;

    public function __construct(QuestionCrudApplication $questionCrudApplication, AnswerCrudApplication $answerCrudApplication)
    {
        $this->questionCrudApplication = $questionCrudApplication;
        $this->answerCrudApplication = $answerCrudApplication;
    }

    public function create(Request $request)
    {
        $questionId = $request->route('questionId');
        $question = $this->questionCrudApplication->getById($questionId);
        return view('pages.answer.create')->with('questionContent', $question->content)->with('questionId', $questionId);
    }

    public function store(StoreAnswerRequest $request)
    {
        try {
            $this->answerCrudApplication->addAnswer($request);
            return redirect()->route('question.detail', ['id' => $request->input('question_id')])->with('success', 'Answer has been successfully added');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
