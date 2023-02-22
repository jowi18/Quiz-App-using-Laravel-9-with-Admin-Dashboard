<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Question;

class Answer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function question(){
        // RELATIONSHIP BETWEEN ANSWER AND QUESTION - IT MEANS THE ANSWER HAS DEDICATED QUESTION
        return $this->belongsTo(Question::class);
    }
    

    public function storeAnswer($data, $question){
        foreach($data['options'] as $key=>$option){
            $is_correct = false;
            if($key == $data['correct_answer']){
                $is_correct = true;
            }
            $answer = Answer::create([
                'question_id' => $question->id,
                'answer' => $option,
                'is_correct' => $is_correct
            ]);
    }
}   

//this section is for updating the //questions and the answer
    public function updateAnswer($data, $question){ //deleting first the asnswer then store a new one
        $this->deleteAnswer($question->id);
        $this->storeAnswer($data, $question);
    }

    public function deleteAnswer($questionId){ //function for deleting the answer
        Answer::where('question_id', $questionId)->delete();
    }

}