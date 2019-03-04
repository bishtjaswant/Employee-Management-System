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
  
 

<!-- header -->
<?php include_once './includes/header.php'; ?>


 <!-- container start-->
<div class="container">

<!-- register form start -->
<div class="col-md-6 offset-3">
  <form method="post" action="./users/login.php" onsubmit="return validateForm();" autocomplete="on">
  <fieldset>
    <?php if (isset($_SESSION['message'])): ?>
              <div class="alert-danger alert">
               <?= $_SESSION['message']; unset($_SESSION['message'] ); ?>  </div>
    <?php endif; ?>
    <legend>Login For EMS</legend>
 
    
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
  
    <button type="submit" class="btn btn-primary" name="login"> Login </button>
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