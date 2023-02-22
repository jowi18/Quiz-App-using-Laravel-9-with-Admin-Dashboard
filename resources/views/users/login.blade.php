<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    </head>
<center>
<div class="container">
<aside class="col-sm-4" >
    <p>Quiz App</p>
    
    <div class="card">
    <article class="card-body">
        <h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
        <hr>
        @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }} </div>
        @endif

        @error('email')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror  
        <form action="/user/auth" method="POST">
            @csrf
        <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
             </div>
            <input name="email" class="form-control" placeholder="Email or login" type="email">
        </div> <!-- input-group.// -->
        </div> <!-- form-group// -->
        <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
             </div>
            <input name="password" class="form-control" placeholder="******" type="password">
        </div> <!-- input-group.// -->
        </div> <!-- form-group// -->
        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Login  </button>
        </div> <!-- form-group// -->
        <p class="text-center"><a href="#" class="btn">Forgot password?</a></p>
        </form>
    </article>
    </div> <!-- card.// -->
    
        </aside> <!-- col.// -->
    </div> <!-- row.// -->
    
    </div> 
    <!--container end.//-->

</center>
</html>