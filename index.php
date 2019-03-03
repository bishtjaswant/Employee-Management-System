<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <!-- material bootstrap -->
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    <title>employee management system</title>
  </head>
  <body>
  
<header>
  
<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Employee management system</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search  EMS........">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search </button>
    </form>
  </div>
</nav>
<!-- navbaar  end here -->
</header>






<!-- container start-->
<div class="container">

<!-- register form start -->
<div class="col-md-6 offset-3">
  <form method="post" action="./users/insert.php" onsubmit="return validateForm();">
  <fieldset>
    <?php if (isset($_SESSION['message'])): ?>
              <div class="alert-danger alert"> <?= $_SESSION['message']; ?>  </div>
    <?php endif; ?>
    <legend>Register For EMS</legend>
 
    <div class="form-group">
      <label for="name">Your name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Yyour name">
      <span id="name_error">  </span>
    </div>

    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="email_error">  </small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="********">
      <small id="pass_error">  </small>

    </div>
    <!-- 
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div> -->
    <fieldset class="form-group">
      <legend>Your department</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="department" id="department1" value="web development" checked="">
      Web development
        </label>
      </div>
      <div class="form-check">
      <label class="form-check-label">
          <input type="radio" class="form-check-input" name="department" id="department2" value="android development">
          Android development
        </label>
      </div>
      <div class="form-check disabled">
      <label class="form-check-label">
          <input type="radio" class="form-check-input" name="department" id="department3" value="SEO" disabled="">
          SEO
        </label>
      </div>
    </fieldset>
    <button type="reset" class="btn btn-danger">Cancel</button>
    <button type="submit" class="btn btn-primary" name="register"> Register Now</button>
  </fieldset>
</form>  <!-- end register form -->
 </div> 


</div><!-- containser end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="./js/script.js"></script>
  </body>
</html>