<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuizController extends Controller
{
    public function index(){
       
       $questions=Question::All();
       
        // $questions=Question::paginate(2);
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

    public function ValidateAnswers(Request $request){
        // dd("we are here");

        //get the questions from the db
        //get
        $questions = Question::with('answers')->get();
        $totalQuestions = $questions->count();
        $userScore = 0;
        
        // dd($totalQuestions);

        foreach ($questions as $question) {
            $submittedAnswers = $request->input('answer_option'.$question->id);
            // $totalQuestions = $questions->count();
            // $correctAnswers = $question->answers->pluck('id')->toArray();
            $correctAnswers = $question->pluck('correct_answer_id')->toArray();
            // dd($correctAnswers);

            if (!empty($submittedAnswers) && $this->validated($submittedAnswers, $correctAnswers)) {
                $userScore++;
                
            
        }
        }
        dd($userScore);
    }


    private function validated($submittedAnswers, $correctAnswers)
{
    // sort($submittedAnswers);
    // sort($correctAnswers);
// dd("we are here now");
if($submittedAnswers==$correctAnswers){
    

    } else 

    return $submittedAnswers === $correctAnswers;
}
    }



