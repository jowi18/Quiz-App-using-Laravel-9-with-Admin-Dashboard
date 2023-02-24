<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function show(){
        return view('users.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'occupation' => 'min:2',
            'phone' => ['min:2', 'integer'],
            'password' => 'required|min:4|confirmed',
            'address' => 'min:4'
        ]);
        $validated['visible_paasword'] = $validated['password'];
        $validated['password'] = bcrypt($validated['password']);
        $validated['is_admin'] = 0;
        
        $user = User::create($validated);
        auth()->login($user);
        return redirect('/')->with('message', 'Account has been created Successfully!');
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($validated) && auth()->user()->is_admin == 1){
            $request->session()->regenerate();
            return redirect('/');
        }else if(auth()->attempt($validated) && auth()->user()->is_admin != 1){
           return redirect('/student/index');
        } else{

        
            return back()->withErrors(['email' => 'Login Failed']);}
}

        public function examinerIndex(){
            $authuser = auth()->user()->id;
            $assignedQuizId = [];
            $user = DB::table('quiz_user')->where('user_id', $authuser)->get();
            foreach($user as $u){
                array_push($assignedQuizId, $u->quiz_id);
            }
            $quizzes = Quiz::whereIn('id', $assignedQuizId)->get();
            $isExamAssigned = DB::table('quiz_user')->where('user_id', $authuser)->exists();
            $wasQuizCompleted = Result::where('user_id', $authuser)->whereIn('quiz_id', (new Quiz)->hasExamAttempt())->pluck('quiz_id')->toArray();
            return view('student.examview', compact('quizzes','wasQuizCompleted','isExamAssigned'));
        }

        public function logout(Request $request){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            auth()->logout();

            return redirect('/user/login')->with('message', 'Successfully Logout');

        }

           public function alluser(){
            $user = User::latest()->where('is_admin', 0)->paginate(5);
            return view('users.index', ['users' => $user]);
            
           }

           public function showuser($id){
                $user = User::find($id);
                return view('users.edit',['account' => $user]);
           }

           public function update(Request $request, User $user){
            $validated = $request->validate([
                'name' => 'required',
                'email' => ['required', 'email'],
                'occupation' => 'min:2',
                'phone' => ['min:2', 'integer'],
                'address' => 'min:4'
            ]);

            $user->update($validated);
            return back()->with('message', 'Successfully Updated');


           }

           public function destroy(User $user){
            $user->delete();
            return back()->with('message', 'Successfully Deleted');
           }

           public function home(){
            return view('student.index');
           }

}
