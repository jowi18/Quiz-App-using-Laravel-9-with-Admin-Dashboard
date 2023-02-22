
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
		   <form action="/question/store" method="POST">
			@csrf

             <div class="module-body">
							   <div class="control-group">
			   <label class="control-lable" for="name">Choose Quiz</label>
			   <div class="controls"> 
				   <select name="quiz">
                    @foreach ($quiz as $q)
                        
                  
                    <option value="{{ $q->id }}">{{ $q->name }}</option>
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
				   <input type="text" name="question" class="span8 @error('question') border-red @enderror" placeholder="name of a quiz" value="{{old('question')}}" >
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
                @for($i=0; $i<4; $i++)
				   <input type="text" name="options[]" class="span5 @error('options') border-red @enderror" placeholder="options{{ $i + 1 }}" value="{{ old('options[]') }}" >
                   <input type="radio" name="correct_answer" value="{{ $i }}"><span> Is correct answer </span>
                   @endfor
			   </div>
				@error('correct_answer')
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