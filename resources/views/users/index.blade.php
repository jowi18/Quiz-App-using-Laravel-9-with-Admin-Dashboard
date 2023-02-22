@include('backend.layout.navbar')
@include('backend.layout.sidebar')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<div class="span9">
    <div class="content">
        @if(session()->has('message'))
			<div class="alert alert-success">{{ session('message') }} </div>
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
                      <th>Email</th>
                      <th>Occupation</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th></th>
                      <th></th>
        
                    </tr>
                  </thead>
                  <tbody>
            
                        
                    @unless($users->isEmpty())
                    @foreach ($users as $key=>$u)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                      <td>{{ $u->name }}</td>
                      <td>{{ $u->email }}</td>
                      <td>{{ $u->occupation }}</td>
                      <td>{{ $u->address }}</td>
                      <td>{{ $u->phone }}</td>

                      <td><a href="/user/show/{{ $u->id }}"><button class="btn btn-primary">
                        Edit</button></a>

                      </td>
                      
                   
                      <td>
                        <form id="delete-form{{ $u->id }}" method="POST" action="/user/destroy/{{ $u->id }}" >
                            @csrf
                            @method('DELETE')
                      </form>
                      <a href="#" onclick="if(confirm('Do you want to delete?')){        
                            event.preventDefault();
                            document.getElementById('delete-form{{ $u->id }}').submit()
                        }else{
                            event.preventDefault();
                        }
                        
                      "><input type="submit" value="Delete" class="btn btn-danger"></a></td>
                    
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



