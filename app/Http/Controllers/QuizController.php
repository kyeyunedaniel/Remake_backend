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
        $userScore = 10;

        // dd($totalQuestions);

        foreach ($questions as $question) {
            //get the submitted answer (id) from the form from the user
            //
            

            $submittedAnswers = $request->input('answer_option'.$question->id);
            $correctAnswers = $question->correct_answer_id;


            // if ($submittedAnswers==$correctAnswers){
            //     $userScore++;
                
            // }
            if (!empty($submittedAnswers) && $submittedAnswers==$correctAnswers) {
                $userScore++;

                // i was attempting to return all the questions answered and their correct answers
                
                $attempt[] =$question->question_name;
                $attemped_correct[] = $question->correct_answer_id;
                // dd($attemped_correct);
                //$correct_answer_in_table = Answer::where('id','=', $attemped_correct)->pluck('answer_option')->first();
               
            }

            else{
                $userScore=$userScore;
            }
        }
        $data =array(
            'attempt'=>$attempt,
            'attemped_correct'=>$attemped_correct   
        ); 
        return $userScore;
        // dd($data->$attempt);
       
        // foreach ($attempt as $attempt){
        //     dd($attemped_correct);
        //     // echo "".$attempt."</br>"."$attempted_correct";
        // }
        // echo ''.$attempt.'<br>'.$correct_answer_in_table;
    }

//     private function validated($submittedAnswers, $correctAnswers)
// {
//     // sort($submittedAnswers);
//     // sort($correctAnswers);

//     return $submittedAnswers === $correctAnswers;
// }
    }


//make a for loop
//in that for loop first check if the question id match and if they match,continue with the logic  
// get question using the question id
//ge the answer using the answer id

// check the dattabsase to see if the question given has the correct_answer_id matching that of the answer given.
//what if the question are jambled up, then taht means we wont be able to get the right answers for each of the questions given