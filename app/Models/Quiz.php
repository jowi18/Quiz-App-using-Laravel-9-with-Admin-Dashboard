<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function questions(){
        // RELATIONSHIP BETWEEN QUIZ AND QUESTION - IT MEANS THE QUIZ HAS MANY QUESTIONS
        return $this->hasMany(Question::class);
    }

    

    public function storeQuiz($data){
        return Quiz::create($data);
    }

    public function allQuiz(){
        return Quiz::all();
    }

    public function getQuiz($id){
        return Quiz::find($id);
    }
}
