<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuizController extends Controller
{
    public function index(){
       
        $questions=Question::paginate(2);
        // $answers=Answer::inRandomOrder();

        $data =array(
            'questions'=>$questions
            // 'answers'=>$answers
        );
        return view('mcq.quiz')->with($data)->render();

    }
    public function saveAnswer(Request $request){
        session()->put('selectedOption', $request->selectedOption);
    }

    public function newnew(){
        return view ('new');
    }
}
