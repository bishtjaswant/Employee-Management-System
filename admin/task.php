<?php include 
'../authentication/auth.php'; 
require_once '../config/db.php'; ?>


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
      <div class="col-md-10 ">
        <form method="post" action="./insert-task.php" onsubmit="return validateForm();">
          <fieldset>
            <?php if (isset($_SESSION['message'])): ?>
            <div class="alert-success alert text-capitalize"> <?= $_SESSION['message']; unset($_SESSION['message'] );  ?>  </div>
            <?php endif; ?>
            <h1>Assigning task to employee</h1>
            
            <div class="row" style="margin-top: 29px;">
              <div class="col-md-4" style="background-color: #CFDEF3;padding: 25px;overflow: scroll;">
                <fieldset class="form-group">
                  <legend>Employee Lists</legend>
                  
    <!-- retriving all records -->

    <?php 
      $role = 'employee';
      $stmt =  $conn->prepare("SELECT * FROM `users`  WHERE `users`.`role` = :role  ORDER BY `id` desc ");

       if (is_object($stmt)) {
         $stmt->execute(['role'=> $role]); 

              if ($stmt->rowCount()> 0) {
                      $rows =    $stmt->fetchAll(PDO::FETCH_ASSOC);
                       
                      foreach ($rows as $data) {
                        
                      ?>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="emp[]" id="department1" value="  <?php echo  $data['id']; ?>">
                      <?php echo  $data['name']; ?>
                    </label>
                  </div>
                      <?php
                      }
              }   
       }  



     ?>
     
<!-- currently_logged_user_id -->
                 <input type="hidden" name="currently_logged_user_id" value="<?=  $_SESSION['currently_logged_user_id'] ; ?>">
                   
                 
                </fieldset>
              </div>
              <div class="col-md-8" style="background-color: #C4E0E5;padding: 25px;">
                <div class="form-group">
                  <textarea rows="5" style="resize: none;" class="form-control" id="message" name="message" placeholder=" write some Message/Task"></textarea>
                </div>
              </div>
            </div>
            
            
            
            <button type="submit" style="margin-top: 25px;" class="btn btn-primary" name="task"> Task </button>
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