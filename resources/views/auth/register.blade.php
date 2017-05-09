
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Please Register</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
     @if ($errors->any())
        <div class='alert alert-danger'>
          @foreach ( $errors->all() as $error )
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      <form class="form-signin" action="/register" method="post">
       {{csrf_field()}}
        <h2 class="form-signin-heading">Please Register</h2>
        <input type="text" name="name" id="first_name" class="form-control input-sm" placeholder="Name" required autofocus>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autofocus> 
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
            <a href="login" class="pull-right">Login</a>
        </div>
        <button  class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    
        
      </form

    </div> <!-- /container -->


  </body>
</html>

 
