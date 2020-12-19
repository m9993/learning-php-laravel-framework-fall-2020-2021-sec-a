<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Registration</title>
  </head>
  <body>
    
  <div class="container">
    
    <h4 class="mt-5 mb-5 text-danger">Online Shop Management System</h4>
    <h5 class="mt-5 mb-5">Registration</h5>


    @if(count($errors)>0)
      <div class="alert alert-danger p-3" role="alert">
      @foreach($errors->all() as $err)
      {{$err}} <br>
	  	@endforeach
      </div>
	  	@endif

      @if(session('msg'))
      <div class="'alert alert-{{session('type')}} p-3" role="alert">
      {{session('msg')}}
      </div>
	  	@endif

    
    <form method="POST">
    @csrf
      <div class="form-group">
        <label for="name">name</label>
        <input type="" class="form-control" id="name" name="name" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <label for="name">username</label>
        <input type="" class="form-control" id="username" name="username" value="{{old('username')}}">
      </div>
      <div class="form-group">
        <label for="contactno">contactno</label>
        <input class="form-control" id="contactno" name="contactno" value="{{old('contactno')}}">
      </div>
      <div class="form-group">
        <label for="">role</label>
        <select class="form-control" name="role">
          <option selected value="employee">Employee</option>
          <option {{ old('role') == 'admin' ? "selected" : "" }} value="admin">Admin</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{old('password')}}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>


  </div>








    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
