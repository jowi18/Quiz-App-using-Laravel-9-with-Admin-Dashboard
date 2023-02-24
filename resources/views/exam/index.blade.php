@include('backend.layout.navbar')
@include('backend.layout.sidebar')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<div class="span9">
    <div class="content">
        @if(session()->has('messages'))
			<div class="alert alert-success">{{ session('messages') }} </div>
			@endif
            @if(session()->has('Errmessages'))
			<div class="alert alert-danger">{{ session('Errmessages') }} </div>
			@endif
        
        <div class="module">
            <div class="module-head">
                <h3>User Exam</h3>
            </div>

            <div class="module-body">
                <table class="table table-striped">
                  <thead>
                   
                        
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Quiz</th>
                      <th></th>
                      <th></th>
        
                    </tr>
                  </thead>
                  <tbody>
            
                        
                    @unless($quizzes->isEmpty())
                    @foreach ($quizzes as $quiz)
                    @foreach ($quiz->users as $key=>$user )
                        
                    
                    <tr>
                        <td>{{ $key + 1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $quiz->name }}</td>
                
                     

                      <td><a href="/quiz/question/{{ $quiz->id }}"><button class="btn btn-success">
                        View Questions</button></a>

                      </td>
                      <td>
                        <form action="/exam/remove" method="POST">@csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                      </td>

                  
                        @endforeach
                      @endforeach

                      @else
                      <td  colspan="6">No User Found</td>
                    </tr>
                    @endunless
                 

                  </tbody>
                </table>
               </div>
           </div>
        
        </div>
        
       </div>
</div> 



