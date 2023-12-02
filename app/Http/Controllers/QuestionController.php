<?php

namespace App\Http\Controllers;

use App\Applications\Answers\AnswerCrudApplication;
use App\Http\Requests\StoreQuestionRequest;
use App\Applications\Questions\QuestionCrudApplication;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private QuestionCrudApplication $questionCrudApplication;
    private AnswerCrudApplication $answerCrudApplication;

    public function __construct(QuestionCrudApplication $questionCrudApplication, AnswerCrudApplication $answerCrudApplication)
    {
        $this->questionCrudApplication = $questionCrudApplication;
        $this->answerCrudApplication = $answerCrudApplication;
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


    function edit(Request $request)
    {
        $data = $this->questionCrudApplication->getById($request->route('id'));
        return view('pages.question.edit')->with('data', $data);
    }


    function detail(Request $request)
    {
        $questionId = $request->route('id');
        $data = $this->questionCrudApplication->getById($questionId);
        $answers = $this->answerCrudApplication->getAnswersByQuestionId($questionId);
        return view('pages.question.detail')->with('data', $data)->with('answers', $answers);
    }

    function store(StoreQuestionRequest $request)
    {
        try {
            $this->questionCrudApplication->addQuestion($request);
            return redirect()->route('question.index')->with('success', 'Question has been successfully added');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function update(UpdateQuestionRequest $request)
    {
        try {
            $this->questionCrudApplication->updateQuestion($request->route('id'), $request);
            return redirect()->route('question.index')->with('success', 'Question has been successfully updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function delete(Request $request)
    {
        try {
            $this->questionCrudApplication->deleteQuestion($request->route('id'));
            return redirect()->route('question.index')->with('success', 'Question has been successfully deleted');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
