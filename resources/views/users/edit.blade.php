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
                                <h3>Update User</h3>
                            </div>

                            <div class="module-body">
                            	<form action="/user/update/{{ $account->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                            		<div class="control-group">
                            			<label class="control-lable">Name</label>
                            			<div class="controls">
                            				<input type="text" name="name" class="span8 @error('name') border-red @enderror" placeholder="name" value="{{$account->name}}" >
                                           

                            			</div>
                                         @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror  

                            		</div>
                                      


                            		<div class="control-group">
									<label class="control-lable" for="email">Email</label>
									<div class="controls"> 
										<input type="text" name="email" class="span8 @error('question') border-red @enderror" placeholder="email" value="{{$account->email}}" >
									</div>
									 @error('email')
									<span class="invalid-feedback" role="alert">
									    <strong>{{ $message }}</strong>
									</span>
									@enderror      

									</div>

                                  
                                 
                                    <div class="control-group">
                                    <label class="control-lable" for="occupation">Occupation</label>
                                    <div class="controls"> 
                                        <input type="text" name="occupation" class="span8 @error('question') border-red @enderror" placeholder="occupation" value="{{$account->occupation}}" >
                                    </div>
                                     @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror      

                                    </div>

                                    <div class="control-group">
                                    <label class="control-lable" for="occupation">Address</label>
                                    <div class="controls"> 
                                        <input type="text" name="address" class="span8 @error('address') border-red @enderror" placeholder="address" value="{{$account->address}}" >
                                    </div>
                                     @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror      

                                    </div>

                                    <div class="control-group">
                                    <label class="control-lable" for="occupation">Phone</label>
                                    <div class="controls"> 
                                        <input type="number" name="phone" class="span8 @error('phone') border-red @enderror" placeholder="phone" value="{{$account->phone}}" >
                                    </div>
                                     @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror      

                                    </div>
				
								<div class="control-group">
									<button type="submit" class="btn btn-success">Update</button>

								</div>


                            	

                            </form>

                       		</div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 


