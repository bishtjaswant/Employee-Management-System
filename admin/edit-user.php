<?php include '../authentication/auth.php';
require_once '../config/db.php';  ?>

<!doctype html>
<html lang="en">
  <head>
    <!--  Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <!-- material bootstrap -->
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    <title>employee management system (edit  user)</title>
  </head>
  <body>



   <!-- header -->
<?php include_once './includes/header.php'; ?>





<!-- container start-->
<div class="container">

<!-- register form start -->
<div class="col-md-6 offset-3">
  <form method="post" action="./update-user.php" onsubmit="return validateForm();">
  <fieldset>
    <?php if (isset($_SESSION['message'])): ?>
              <div class="alert-success alert text-capitalize"> <?= $_SESSION['message']; unset($_SESSION['message'] );  ?>  </div>
    <?php endif; ?>

<!-- hidden field for deleting user -->
    <input type="hidden" name="user_id" value="<?= $_GET['id'];?>">



    <!-- retriving all record by id -->
<?php
         if(isset($_GET['id'])){
                $stmt  = $conn->prepare("SELECT * FROM `users` WHERE `users`.`id`  = :uid");
               $stmt->execute([':uid'=> $_GET['id']]);
               $row = $stmt->fetch(PDO::FETCH_ASSOC);
             } else {
               header("Location:  http://localhost/EMS/admin/dashboard.php");
             }
?>

    <h1>Edit users</h1>

 
    <div class="form-group">
      <label for="name">Your name</label>
      <input type="text" value="<?=$row['name']; ?>" class="form-control" id="name" name="name" placeholder="Yyour name">
      <span id="name_error">  </span>
    </div>

    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" value="<?=$row['email']; ?>" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="email_error">  </small>
    </div>
 
    <div class="row">
       <div class="col-md-6">
          <fieldset class="form-group">
      <legend>Your department</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="department" id="department1" value="web development" 
          <?php if ($row['dept'] == 'web development') {  echo 'checked'; } ?>   >
          
      Web development
        </label>
      </div>
      <div class="form-check">
      <label class="form-check-label">
          <input type="radio" class="form-check-input" name="department" id="department2" value="android development"
             <?php if ($row['dept'] == 'android development') {  echo 'checked'; } ?>   >
          Android development
        </label>
      </div>
      <div class="form-check disabled">
      <label class="form-check-label">
          <input  <?php if ($row['dept'] == 'SEO') {  echo 'checked'; } ?>  type="radio" class="form-check-input" name="department" id="department3" value="SEO" >
          SEO
        </label>
      </div>
    </fieldset>
       </div>

       <div class="col-md-6">
          <fieldset class="form-group">
      <legend>Your Role</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" <?php if ($row['role'] == 'admin') {  echo 'checked'; } ?>   name="role" id="role1" value="admin">
      Register as admin
        </label>
      </div>
      <div class="form-check">
      <label class="form-check-label">
          <input type="radio" class="form-check-input" <?php if ($row['role'] == 'employee') {  echo 'checked'; } ?> name="role" id="role2" value="employee" >
          Register as employee
        </label>
      </div>
       
    </fieldset>
       </div>
    </div>

    <button type="submit" class="btn btn-primary" name="update"> Update Now</button>
  
  </fieldset>
</form>  <!-- end register form -->
 </div> 


</div><!-- containser end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js"></script>
  </body>
</html>