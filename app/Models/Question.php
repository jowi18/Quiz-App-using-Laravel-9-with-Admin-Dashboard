<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
use App\Models\Quiz;

class Question extends Model
{    
    
    use HasFactory;
    protected $guarded = ['id'];

    public function answers(){
        // RELATIONSHIP BETWEEN QUESTION AND ANSWER - IT MEANS THE QUESTION HAS MANY ANSWER
        return $this->hasMany(Answer::class);
    }

    public function quiz(){
        // RELATIONSHIP BETWEEN QUESTION AND QUIZ - IT MEANS THE QUESTION HAS DESIGNATED QUIZ NAME
        return $this->belongsTo(Quiz::class);
    }

    
    public function storeQuestion($data){
        $data['quiz_id'] = $data['quiz'];
        return Question::create($data);
    }

    //this section is for updating the //questions and the answer
    public function updateQuestion($id, $data){
        $question = Question::find($id); //find first the question
        $question->question = $data['question']; // call the question and save the existing question from database
        $question->quiz_id = $data['quiz']; // call the quiz_id and save the existing question from database
        $question->save(); //save

        return $question; //return the question
    }

    public function deleteQuestion(Question $question){
        $question->delete();
    }
}
