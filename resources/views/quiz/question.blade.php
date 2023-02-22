@include('backend.layout.navbar')
@include('backend.layout.sidebar')

				<div class="span9">
                    <div class="content">

                    	 <!--foreach-->
                        @foreach ($quizAns as $quiz)
                            
                       
                        <div class="module">
                            <div class="module-head">
                                
                                  <h3>{{ $quiz->name }}</h3>

                            </div>

                            <div class="module-body">
                            	

                            <p><h3  class="heading"></h3></p>


                             

                                <div class="module-body table">
                            <!--foreach CREATEING LOOP WITH RELATIONSHIP BETWEEN QUIZ AND QUESTIONS-->
                                    @foreach ($quiz->questions as $key=>$question) 
                                        
                                 
                                    <table class="table table-message">
                                        <tbody>
                                           
                                               
                                            
                                            
                                            <tr class="read">
                                                 
                                                {{ $key + 1 }}. {{ $question->question }}
                                                
                                                <td class="cell-author hidden-phone hidden-tablet">
                                     <!--foreach CALL OUT THE RELATIONSHIP BETWEEN QUESTION AND ANSWER-->
                                                     @foreach ($question->answers as $answer) 
                                                         
                                                    

                                                        <p>
                                                            {{ $answer->answer }} 
                                                            @if($answer->is_correct)
                                                           <span class="badge badge-success"> 
                                                            Correct answer
                                                           </span>
                                                            @endif
                                                        </p>
                                                        @endforeach
                                                    <!--endforeach-->
                                                </td>

                                                

                                               
                                            </tr>
                                           


                                        </tbody>

                                    </table>
                                    <!--endforeach FOR THE ANSWERS-->
                                    @endforeach
                                </div>
                              
                            <!--endforeach FOR THE NAME OF THE QUESTION-->
                            @endforeach

                                <div class="module-foot">
                                <td>
                                    <a href="/quiz/index"><button class="btn btn-inverse pull-center">Back</button></a>
                                 </td>
                                </div>

                       	
                            </div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

            </div> 
            </div> 

