<?php

namespace App\Applications\Answers;

use App\Http\Requests\StoreAnswerRequest;
use App\Models\Answer;

class AnswerCrudApplication
{
    public function addAnswer(StoreAnswerRequest $request)
    {
        $answer = new Answer();
        $answer->content = $request->input('content');
        $answer->question_id = $request->input('question_id');

        $answer->save();
    }
}
