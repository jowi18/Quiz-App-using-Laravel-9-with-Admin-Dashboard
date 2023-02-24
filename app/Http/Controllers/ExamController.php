<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Result;
class ExamController extends Controller
{
    public function create(){   
            $quiz = Quiz::all();
        return view('exam.assign',['quiz' => $quiz]);
    }

   public function assignExam(Request $request){
    $quiz = (new Quiz)->assignExam($request->all());
    return back()->with('messages', 'Exam assigned to user');
   }

   public function index(){
    $quiz = Quiz::all();
    return view('exam.index', ['quizzes' => $quiz]);
   }

   public function removeExam(Request $request){
        $userId = $request->get('user_id');
        $quizId = $request->get('quiz_id');
        $quiz = Quiz::find($quizId);
        $result = Result::where('quiz_id', $quizId)->where('user_id', $userId)->exists();
        if($result){
            return back()->with('Errmessages', 'Exam is answered by the user, cannot be removed!');
        }else{
            $quiz->users()->detach($userId);
            return back()->with('messages', 'Exam is unassigned to user');
        }
    }

}
