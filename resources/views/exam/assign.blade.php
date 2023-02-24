
@include('backend.layout.navbar')
@include('backend.layout.sidebar')


<div class="span9">
	<div class="content">
		@if(session()->has('messages'))
			<div class="alert alert-success">{{ session('messages') }} </div>
			@endif
		   
		   <div class="module">
		   <div class="module-head">
			   <h3>Assign Quiz</h3>
		   </div>
		   <form action="/exam/assigning" method="POST">
			@csrf

             <div class="module-body">
							   <div class="control-group">
			   <label class="control-lable" for="name">Choose Quiz</label>
			   <div class="controls"> 
				   <select class="span8" name="quiz_id">
                    @foreach ($quiz as $q)
                        
                  
                    <option value="{{ $q->id }}">{{ $q->name }}</option>
                    @endforeach
                   </select>
                
			   </div>
				@error('quiz_id')
			   <span class="invalid-feedback" role="alert">
				   <strong>{{ $message }}</strong>
			   </span>
		   @enderror      

		   </div>

           
				 <div class="control-group">
			   <label class="control-lable" for="name">Choose User</label>
			   <div class="controls"> 
				   <select class="span8" name="user_id">
                    @foreach (App\Models\User::all()->where('is_admin', 0) as $user)
                        
                  
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                   </select>
                
			   </div>
				@error('user_id')
			   <span class="invalid-feedback" role="alert">
				   <strong>{{ $message }}</strong>
			   </span>
		   @enderror      

		   </div>

		 

		   <div class="control-group">
			   <div class="controls">
				   <button type="submit" class="btn btn-success">Submit</button>
			   </div>

	   </div>

	   </form>

		  </div>
	   </div>


</div>
</div>