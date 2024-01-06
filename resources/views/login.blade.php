<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Login Form</title>
  </head>
  <body>
    
  <div class="container mt-5" style="width:500px">
<div class="container">
  <h3 class="mx-auto"><a href="{{route('login')}}" style="text-decoration:none; color:White">Login</a></h3>
</div>

  <div class="mt-5">
    @if($errors->any())
    <div class="col-12">
      @foreach ($errors->all() as $error )
      <div class="alert alert-danger">{{$error}}</div>
        
      @endforeach
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger">{{$error}}</div>
      
    @endif
    
  </div>

     <form class="mt-5 ms-auto me-auto" action="{{route('login.post')}}" method="POST">
     @csrf   
     <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label >Password</label>
            <input type="password" class="form-control" name="password"  placeholder="Password">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
        <small class="form-text text-muted">If You Have Not Account! Registration Your Self  <a href="{{route('registration')}}" style="text-decoration:none;">Registration</a> </small> 
      </form>
  </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
  </body>
</html>