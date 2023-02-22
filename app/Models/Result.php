<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Answer;
class Result extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function question(){
        // RELATIONSHIP BETWEEN RESULT AND QUESTION - IT MEANS THE RESULT HAS DEDICATED QUESTION
        return $this->belongsTo(Question::class);
    }

    public function answer(){
        // RELATIONSHIP BETWEEN RESULT AND ANSWER - IT MEANS THE RESULT HAS DEDICATED ANSWER
        return $this->belongsTo(Answer::class);
    }
}
