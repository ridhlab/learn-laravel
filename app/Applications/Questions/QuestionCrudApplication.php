<?php

namespace App\Applications\Questions;

use App\Models\Question;

class QuestionCrudApplication
{
    public function addQuestion($request)
    {
        $question = new Question();
        $question->content = $request['content'];

        $question->save();
    }

    public function fetch()
    {
        $questions = Question::all();
        return $questions;
    }
}
