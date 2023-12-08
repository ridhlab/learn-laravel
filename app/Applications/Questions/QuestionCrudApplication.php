<?php

namespace App\Applications\Questions;

use App\Http\Requests\StoreQuestionRequest;
use App\Models\Question;

class QuestionCrudApplication
{
    public function addQuestion(StoreQuestionRequest $request,  string $userId)
    {
        $question = new Question();
        $question->content = $request->validated()['content'];
        $question->user_id = $userId;

        $question->save();
    }

    public function fetch()
    {
        $questions = Question::all();
        return $questions;
    }

    public function getById($id)
    {
        $question = Question::findOrFail($id);
        return $question;
    }

    public function updateQuestion($id, $request)
    {
        $question = Question::findOrFail($id);
        $question->content = $request->content;
        $question->save();
    }

    public function deleteQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
    }
}
