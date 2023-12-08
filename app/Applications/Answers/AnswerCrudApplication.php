<?php

namespace App\Applications\Answers;

use App\Http\Requests\StoreAnswerRequest;
use App\Models\Answer;

class AnswerCrudApplication
{
    public function addAnswer(StoreAnswerRequest $request, string $userId)
    {
        $answer = new Answer();
        $answer->content = $request->input('content');
        $answer->question_id = $request->input('question_id');
        $answer->user_id = $userId;

        $answer->save();
    }

    public function getAnswersByQuestionId($questionId)
    {
        $answers = Answer::where('question_id', $questionId)->get();
        return $answers;
    }
}
