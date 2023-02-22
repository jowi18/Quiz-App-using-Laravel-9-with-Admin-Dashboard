@include('backend.layout.navbar')
@include('backend.layout.sidebar')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<div class="span9">
    <div class="content">
        @if(session()->has('messages'))
			<div class="alert alert-success">{{ session('messages') }} </div>
			@endif
        
        <div class="module">
            <div class="module-head">
                <h3>All Quiz</h3>
            </div>

            <div class="module-body">
                <table class="table table-striped">
                  <thead>
                   
                        
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Minutes</th>
                      <th></th>
                      <th></th>
        
                    </tr>
                  </thead>
                  <tbody>
            
                        
                    @unless($quiz->isEmpty())
                    @foreach ($quiz as $key=>$quizzes)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                      <td>{{ $quizzes->name }}</td>
                      <td>{{ $quizzes->description }}</td>
                      <td>{{ $quizzes->minutes }}</td>

                      <td><a href="/quiz/question/{{ $quizzes->id }}"><button class="btn btn-success">
                        View Questions</button></a>

                      </td>

                      <td><a href="/quiz/show/{{ $quizzes->id }}"><button class="btn btn-primary">
                        Edit</button></a>

                      </td>
                      
                   
                      <td>
                        <form id="delete-form{{ $quizzes->id }}" method="POST" action="/quiz/delete/{{ $quizzes->id }}" >
                            @csrf
                            @method('DELETE')
                      </form>
                      <a href="#" onclick="if(confirm('Do you want to delete?')){        
                            event.preventDefault();
                            document.getElementById('delete-form{{ $quizzes->id }}').submit()
                        }else{
                            event.preventDefault();
                        }
                        
                      "><input type="submit" value="Delete" class="btn btn-danger"></a></td>
                    
                      @endforeach

                      @else
                      <td  colspan="6">No Quiz Found</td>
                    </tr>
                    @endunless
                 

                  </tbody>
                </table>
               </div>
           </div>
        
        </div>
        
       </div>
</div> 



