<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question_id' => 'required',
            'answer_a' => 'required',
            'answer_b' => 'required',
            'answer_c' => 'required',
            'answer_d' => 'required',
        ]);

        $q_id = $validatedData['question_id'];

        $answer_a = $validatedData['answer_a'];
        $answer_b = $validatedData['answer_b'];
        $answer_c = $validatedData['answer_c'];
        $answer_d = $validatedData['answer_d'];
        $pos_a = 0;
        $pos_b = 1;
        $pos_c = 2;
        $pos_d = 3;

        $this->create_answer($q_id, $answer_a, $pos_a);
        $this->create_answer($q_id, $answer_b, $pos_b);
        $this->create_answer($q_id, $answer_c, $pos_c);
        $this->create_answer($q_id, $answer_d, $pos_d);

        return redirect()->back();
    }

    public function create_answer($q_id, $answer, $pos)
    {
        $answers = new Answer;
        $answers->question_id = $q_id;
        $answers->answer = $answer;
        $answers->pos = $pos;

        $answers->save();
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'question_id' => 'required',
            'answer_id_a' => 'required',
            'answer_id_b' => 'required',
            'answer_id_c' => 'required',
            'answer_id_d' => 'required',
            'answer_a' => 'required',
            'answer_b' => 'required',
            'answer_c' => 'required',
            'answer_d' => 'required',
        ]);
    }
}
