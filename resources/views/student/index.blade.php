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
            
            <a class="nav-link" href="/student/index">
             Home
         </a>

        </li>
        <li class="nav-item">

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
        <div class="card">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="/exam/viewexam" class="btn btn-primary">View Exam</a>
            </div>
          </div>
</div>


</body>
</html>