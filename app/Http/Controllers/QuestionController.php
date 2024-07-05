<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::leftJoin('answers', 'answers.id', '=', 'questions.answer_key')->orderBy('questions.created_at', 'ASC')->get(['questions.id', 'questions.question', 'questions.answer_key', 'answer', 'pos']);

        // $answers = Answer::join('questions', 'questions.answer_key', '=', 'answers.id')->get();

        // $data = Country::join('state', 'state.country_id', '=', 'country.country_id')
        //     ->join('city', 'city.state_id', '=', 'state.state_id')
        //     ->get(['country.country_name', 'state.state_name', 'city.city_name']);


        return view('questions', [
            "title" => "Test Question - SiCantik Admin Panel",
            "pageIndex" => 3,
            "questions" => $questions,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'question' => 'required',
            ]);
        } catch (ValidationException $e) {
            $errors = $e->errors();
            return response()->json(['error' => 'Terjadi Kesalahan', 'errors' => $errors], 422);
        }

        $questionData = new Question;
        $questionData->question = $validatedData['question'];

        if ($questionData->save()) {
            return response()->json(
                ['messages' => 'New Module Created'],
                Response::HTTP_OK
            );
        }
    }

    public function question_setting($id)
    {
        $questionData = Question::findOrFail($id);
        $answers = Answer::where('question_id', $id)->get();

        $key_id = $questionData['answer_key'];
        $answer_key = Answer::where('id', $key_id)->first();
        return view('setting_question', [
            "title" => "Question Setting - SiCantik Admin Panel",
            "pageIndex" => 3,
            "question" => $questionData,
            "answers" => $answers,
            "answer_key" => $answer_key,
        ]);
    }

    public function set_key(Request $request, $id)
    {
        $questionData = Question::findOrFail($id);
        $questionData->answer_key = $request->answer_id;
        $questionData->update();

        if ($questionData->save()) {
            return redirect()->back();
        }
    }


    // API
    public function getAllQuestions()
    {
        $qData = Question::join('answers', 'answers.id', '=', 'questions.answer_key')->get(['questions.id', 'question', 'point', 'answer_key', 'answer', 'pos',]);
        return QuestionResource::collection($qData);
    }

    public function countPreDone()
    {
        $preUser = User::whereNotNull('pre_score')->count();

        return response()->json([
            'messages' => 'Successfully get total users completed pre test',
            'data' => [
                'total_pre_user' => $preUser,
            ]
        ], Response::HTTP_OK);
    }

    public function countPostDone()
    {
        $postUser = User::whereNotNull('post_score')->count();

        return response()->json([
            'messages' => 'Successfully get total users completed post test',
            'data' => [
                'total_post_user' => $postUser,
            ]
        ]);
    }
}
