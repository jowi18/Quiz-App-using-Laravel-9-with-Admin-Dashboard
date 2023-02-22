<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = (new Quiz)->allQuiz();
        return view('quiz.index', ['quiz' => $quiz]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|min:3|max:500',
            'minutes' => 'required|integer'
        ]);

        $quiz  = (new Quiz)->storeQuiz($validated);
        return back()->with('messages', 'Quiz Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('quiz.edit', ['quizzes' => $quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|min:3|max:500',
            'minutes' => 'required|integer'
        ]);

        $quiz->update($validated);
        return back()->with('messages', 'Quiz Edited Successfully!');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Quiz $quiz)
    {
        $quiz->delete();
        return back()->with('messages', 'Quiz Deleted Successfully!');

    }

    public function question($id){
        //calling all the questions belongs to the quiz by using the relationship between quiz and questions
        $quizzes = Quiz::with('questions')->where('id', $id)->get();
        return view('quiz.question', ['quizAns' => $quizzes]);
    }
}
