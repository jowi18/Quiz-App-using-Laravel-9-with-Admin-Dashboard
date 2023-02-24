<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
<body>
<nav>
    <ul class="nav justify-content-end">
        <li class="nav-item">
          <li class="nav-item">
            
            <a class="nav-link" href="/student/index">
             Home
         </a>
          </li>
            <a class="nav-link" href="/user/logout"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>

         <form id="logout-form" action="/user/logout" method="POST" style="display: none;">
             @csrf
         </form>
        </li>
      </ul>
</nav>
    

    <div class="container">
      @if($isExamAssigned)
      @foreach ($quizzes as $quiz)
<div class="card">
        @foreach ($quiz->users as $user)
          
    <div class="card-header">
     Hello {{ $user->name }}
      @endforeach
    </div>
    <div class="card-body">
      <h5 class="card-title">Quiz Title: {{ $quiz->name }}</h5>
      <p class="card-text">About exam: {{ $quiz->description }}</p>
      <p class="card-text">Time Allocated: {{ $quiz->minutes }} minutes</p>
      <p class="card-text">Number of question: {{ $quiz->questions->count() }}</p>
      <p class="card-text">
        @if(!in_array($quiz->id, $wasQuizCompleted))
        <a href="#" class="btn btn-primary">Start Quiz</a> 
      </p>
      @else
      <p class="card-text">Completed</p>
      @endif
   
       
  
      
    </div>
  </div>
  @endforeach
      @endif
</div>


</body>
</html>