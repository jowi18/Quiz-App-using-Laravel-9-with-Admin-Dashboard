@include('backend.layout.navbar')
@include('backend.layout.sidebar')

				<div class="span9">
                    <div class="content">
                    	
                        <div class="module">
                            <div class="module-head">
                                
                                  
                            </div>

                            <div class="module-body">
                            	
                                
                            <p><h3  class="heading">{{ $questions->question }}</h3></p>



                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            
                                            
                                            <tr class="read">
                                                @foreach ($questions->answers as $key=>$answer)
                                                    
                                              
                                                
                                                <td class="cell-author hidden-phone hidden-tablet">
                                                    {{ $key + 1 }}.
                                                    {{ $answer->answer }}
                                                    @if($answer->is_correct)
                                                    <span class="badge badge-success pull-right">correct</b></span>
                                                    @endif
                                                </td>

                                            </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>
                                <form id="delete-form{{ $questions->id }}" method="POST" action="/question/delete/{{ $questions->id }}" >
                                    @csrf
                                    @method('DELETE')
                              </form>
                                <div class="module-foot">
                                    <a href="/question/edit/{{ $questions->id }}" ><button class="btn btn-primary">Edit</button></a>
                                   
                                  <a href="#" onclick="if(confirm('Do you want to delete?')){        
                                        event.preventDefault();
                                        document.getElementById('delete-form{{ $questions->id }}').submit()
                                    }else{
                                        event.preventDefault();
                                    }
                                    
                                  "><button type="submit" class="btn btn-danger">Delete</button>
                                  
                                </div>
                                

                       	
                            </div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

            </div> 
            </div> 


