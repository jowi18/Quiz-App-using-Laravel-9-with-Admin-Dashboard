@include('backend.layout.navbar')
@include('backend.layout.sidebar')

				<div class="span9">
                    <div class="content">
                    	@if(Session::has('message'))

                    		<div class="alert alert-success">
                    			{{Session::get('message')}}
                    		</div>

                    	@endif
                        <div class="module">
                            <div class="module-head">
                                <h3>Create User</h3>
                            </div>

                            <div class="module-body">
                            	<form action="/user/auth" method="POST">
                                    @csrf

                            		<div class="control-group">
                            			<label class="control-lable">Email</label>
                            			<div class="controls">
                            				<input type="email" name="email" class="span8 @error('email') border-red @enderror" placeholder="Enter Email" value="{{old('email')}}" >
                                           

                            			</div>
                                         @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror  

                            		</div>

                                    <div class="control-group">
                                    <label class="control-lable" for="password">Password</label>
                                    <div class="controls"> 
                                        <input type="password" name="password" class="span8 @error('phone') border-red @enderror" placeholder="Enter Password" value="{{old('phone')}}" >
                                    </div>
                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror      

                                    </div>
				
								<div class="control-group">
									<button type="submit" class="btn btn-success">Login</button>

								</div>


                            	

                            </form>

                       		</div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 


