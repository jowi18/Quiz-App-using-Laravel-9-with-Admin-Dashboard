
@include('backend.layout.navbar')
@include('backend.layout.sidebar')


<div class="span9">
	<div class="content">
		@if(session()->has('messages'))
			<div class="alert alert-success">{{ session('messages') }} </div>
			@endif
		   
		   <div class="module">
		   <div class="module-head">
			   <h3>Create Question</h3>
		   </div>
		   <form action="/question/update/{{$questions->id}}" method="POST">
			@csrf
			@method('PUT')
             <div class="module-body">
							   <div class="control-group">
			   <label class="control-lable" for="name">Choose Quiz</label>
			   <div class="controls"> 
				   <select name="quiz">
                    @foreach (App\Models\Quiz::all() as $q)          
                    <option value="{{ $q->id }}" @if($q->id == $questions->quiz_id) selected @endif >{{ $q->name }}</option>
                    @endforeach
                   </select>
                
			   </div>
				@error('quiz')
			   <span class="invalid-feedback" role="alert">
				   <strong>{{ $message }}</strong>
			   </span>
		   @enderror      

		   </div>

		   <div class="module-body">
							   <div class="control-group">
			   <label class="control-lable" for="name">Question name</label>
			   <div class="controls"> 
				   <input type="text" name="question" class="span8 @error('question') border-red @enderror" placeholder="name of a quiz" value="{{ $questions->question}}" >
			   </div>
				@error('question')
			   <span class="invalid-feedback" role="alert">
				   <strong>{{ $message }}</strong>
			   </span>
		   @enderror      

		   </div>

            <div class="module-body">
							   <div class="control-group">
			   <label class="control-lable" for="option">Options</label>
			   <div class="controls"> 
                @foreach ($questions->answers as $key=>$answer)
                    
              
				   <input type="text" name="options[]" class="span5 @error('options') border-red @enderror"  value="{{ $answer->answer }}" >
                   <input type="radio" name="correct_answer" value="{{ $key }}" @if($answer->is_correct) {{ 'checked' }} @endif ><span> Is correct answer </span>
               @endforeach
                 
			   </div>
				@error('correct_answer')
			   <span class="invalid-feedback" role="alert">
				   <strong>{{ $message }}</strong>
			   </span>
		   @enderror      

		   </div>

		  
		   <div class="control-group">
			   <div class="controls">
				   <button type="submit" class="btn btn-success">Update</button>

				   
			   </div>

	   </div>

	   

	   </form>

		  </div>
	   </div>


</div>
</div>