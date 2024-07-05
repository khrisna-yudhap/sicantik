<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;


class ScoreController extends Controller
{
    public function countPreScore(Request $request)
    {
        $user_id = $request->user_id;
        $answer_key = Question::orderBy('id')->get('answer_key');

        $request->validate([
            'user_id' => 'required',
        ]);

        for ($i = 1; $i <= 10; $i++) {
            if (!is_numeric($request->answers['q' . $i])) {
                return response()->json([
                    'messages' => 'One or more answers is empty or not integer / numeric.',
                    'data' => [
                        'user_id' => $user_id,
                        'answers' => [
                            $request->answers,
                        ]
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }

        // get answers key collection
        $answers_key = [];
        for ($i = 0; $i < 10; $i++) {
            $answers_key['a' . ($i + 1)] = $answer_key[$i]['answer_key'];
        }

        // define users_answers pos
        // $user_answers = [];
        // for ($i = 1; $i <= 10; $i++) {
        //     $user_answers['a' . $i] = $request->answers['q' . $i];
        // }

        $user_answers = [];
        for ($i = 1; $i <= 10; $i++) {
            $user_answers['a' . $i] = $request->answers['q' . $i];
        }

        // $answerMapping = [
        //     "answer_a" => 0,
        //     "answer_b" => 1,
        //     "answer_c" => 2,
        //     "answer_d" => 3
        // ];

        // foreach ($user_answers as $key => $value) {
        //     if (isset($answerMapping[$value])) {
        //         $user_answers[$key] = $answerMapping[$value];
        //     } else {
        //         $user_answers[$key] = null;
        //     }
        // }

        // // define answers id
        // $user_answers_id = [];
        // for ($i = 1; $i <= 10; $i++) {
        //     $user_answers_id['a' . $i] = Answer::where(['question_id' => $i, 'pos' => $user_answers['a' . $i]])->get('id');
        // }
        // foreach ($user_answers_id as $key => $value) {
        //     $user_answers_id[$key] = $value[0]['id'];
        // }

        // check differences
        $collection1 = collect($user_answers);
        $collection2 = collect($answers_key);

        $diff = $collection1->diffAssoc($collection2);

        // count scores
        $wrongAnswers = count($diff);
        $correctAnswers = count($answers_key) - $wrongAnswers;

        $qPoint = (count($answers_key) * 10) / count($answers_key);
        $preScore = $correctAnswers * $qPoint;

        $user = User::find($user_id);

        if ($user == null) {
            return response()->json([
                'messages' => 'User id not found in the server.',
            ], Response::HTTP_NOT_FOUND);
        }

        $user->pre_score = $preScore;
        $user->update();
        if ($user->save()) {
            return response()->json([
                'messages' => 'Successfully save pretest score.',
                'data' => [
                    'user_id' => $user_id,
                    'pre_score' => $preScore
                ]
            ], Response::HTTP_OK);
        };
    }

    public function countPostScore(Request $request)
    {
        $user_id = $request->user_id;
        $answer_key = Question::orderBy('id')->get('answer_key');

        $request->validate([
            'user_id' => 'required',
        ]);

        for ($i = 1; $i <= 10; $i++) {
            if (!is_numeric($request->answers['q' . $i])) {
                return response()->json([
                    'messages' => 'One or more answers is empty or not integer / numeric.',
                    'data' => [
                        'user_id' => $user_id,
                        'answers' => [
                            $request->answers,
                        ]
                    ]
                ], Response::HTTP_BAD_REQUEST);
            }
        }

        // get answers key collection
        $answers_key = [];
        for ($i = 0; $i < 10; $i++) {
            $answers_key['a' . ($i + 1)] = $answer_key[$i]['answer_key'];
        }

        // define users_answers pos
        $user_answers = [];
        for ($i = 1; $i <= 10; $i++) {
            $user_answers['a' . $i] = $request->answers['q' . $i];
        }

        // $answerMapping = [
        //     "answer_a" => 0,
        //     "answer_b" => 1,
        //     "answer_c" => 2,
        //     "answer_d" => 3
        // ];

        // foreach ($user_answers as $key => $value) {
        //     if (isset($answerMapping[$value])) {
        //         $user_answers[$key] = $answerMapping[$value];
        //     } else {
        //         $user_answers[$key] = null;
        //     }
        // }

        // // define answers id
        // $user_answers_id = [];
        // for ($i = 1; $i <= 10; $i++) {
        //     $user_answers_id['a' . $i] = Answer::where(['question_id' => $i, 'pos' => $user_answers['a' . $i]])->get('id');
        // }
        // foreach ($user_answers_id as $key => $value) {
        //     $user_answers_id[$key] = $value[0]['id'];
        // }

        // check differences
        $collection1 = collect($user_answers);
        $collection2 = collect($answers_key);

        $diff = $collection1->diffAssoc($collection2);

        // count scores
        $wrongAnswers = count($diff);
        $correctAnswers = count($answers_key) - $wrongAnswers;

        $qPoint = (count($answers_key) * 10) / count($answers_key);
        $postScore = $correctAnswers * $qPoint;

        $user = User::find($user_id);

        if ($user == null) {
            return response()->json([
                'messages' => 'User id not found in the server.',
            ], Response::HTTP_NOT_FOUND);
        }

        $user->post_score = $postScore;
        $user->update();
        if ($user->save()) {
            return response()->json([
                'messages' => 'Successfully save post test score.',
                'data' => [
                    'user_id' => $user_id,
                    'post_score' => $postScore
                ]
            ], Response::HTTP_OK);
        };
    }
}
