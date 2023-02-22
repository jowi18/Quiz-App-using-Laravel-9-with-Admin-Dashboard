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
                <h3>All Questions</h3>
            </div>

            <div class="module-body">
                <table class="table table-striped">
                  <thead>
                   
                        
                    <tr>
                      <th>#</th>
                      <th>Question</th>
                      <th>Quiz</th>
                      <th>Created</th>
                      <th></th>
                      <th></th>
        
                    </tr>
                  </thead>
                  <tbody>
            
                        
                    @unless($questions->isEmpty())
                    @foreach ($questions as $key=>$quest)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                      <td>{{ $quest->question }}</td>
                      <td>{{ $quest->quiz->name }}</td>
                      <td>{{ date('F d, Y', strtotime($quest->created_at)) }}</td>

                      <td><a href="/question/show/{{ $quest->id }}"><button class="btn btn-primary">
                        View</button></a>

                      </td>
                     
                    
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



