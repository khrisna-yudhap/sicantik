<?php

namespace App\Http\Resources;

use App\Models\Answer;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $answer_list = Answer::where(['question_id' => $this->id])->orderBy('pos', 'ASC')->get();

        $answer_a = $answer_list[0];
        $answer_b = $answer_list[1];
        $answer_c = $answer_list[2];
        $answer_d = $answer_list[3];

        $answer_key = Answer::where(['id' => $this->answer_key])->first();

        if ($answer_key['pos'] == 0) {
            $correct_answer = 'answer_a';
        } elseif ($answer_key['pos'] == 1) {
            $correct_answer = 'answer_b';
        } elseif ($answer_key['pos'] == 2) {
            $correct_answer = 'answer_c';
        } elseif ($answer_key['pos'] ==  3) {
            $correct_answer = 'answer_d';
        } else {
            $correct_answer = null;
        }

        return [
            'id' => $this->id,
            'question' => $this->question,
            'answers' => [
                ['answer_id' => $answer_a->id, 'answer' => $answer_a->answer],
                ['answer_id' => $answer_b->id, 'answer' => $answer_b->answer],
                ['answer_id' => $answer_c->id, 'answer' => $answer_c->answer],
                ['answer_id' => $answer_d->id, 'answer' => $answer_d->answer],
            ],
            'correct_answer' => $correct_answer,
            'point' => $this->point,
        ];
    }
}
