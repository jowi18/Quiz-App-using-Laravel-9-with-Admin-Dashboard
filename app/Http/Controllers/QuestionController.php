<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;
use GuzzleHttp\Psr7\Query;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Question::latest()->with('quiz')->paginate(6);
        return view('question.index',['questions' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Quiz::All();
        return view('question.create', ['quiz' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'quiz' => 'required',
            'question' => 'required|min:3',
            'options' => 'bail|required|min:3|array',
            'options.*' => 'bail|required|string|distinct',
            'correct_answer' => 'required'
        ]);

        $data['quiz_id'] = $data['quiz'];
    
        $question = (new Question)->storeQuestion($data);
        $answer = (new Answer)->storeAnswer($data, $question);
     
        return back()->with('messages', 'Question Created Successfully');
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
    
        return view('question.show', ['questions' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Question $question)
    {
    
        return view('question.edit', ['questions' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'quiz' => 'required',
            'question' => 'required|min:3',
            'options' => 'bail|required|min:3|array',
            'options.*' => 'bail|required|string|distinct',
            'correct_answer' => 'required'
        ]); 

        $quest = (new Question)->updateQuestion($id, $data);
        $answer = (new Answer)->updateAnswer($data, $quest);
        return back()->with('messages', 'Question Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $answer = (new Answer)->deleteAnswer($question);
        $quest = (new Question)->deleteQuestion($question);

        return redirect('/question/index')->with('messages', 'Question Deleted Successfully!');
    }
}
