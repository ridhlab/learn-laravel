<?php

namespace App\Applications\Questions;

use App\Models\Question;

class QuestionCrudApplication
{
    public function store($request)
    {
        $question = new Question();
        $question->content = $request['content'];

        $question->save();
    }
}
