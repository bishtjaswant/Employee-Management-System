<?php include_once '../authentication/auth.php';
require_once '../config/db.php';
 ?>

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
      
<?php if (isset($_SESSION['message'])): ?>
              <div class="alert-success alert text-capitalize"> <?= $_SESSION['message']; unset($_SESSION['message'] );  ?>  </div>
    <?php endif; ?>

<!-- table -->

<h1>User Records </h1>
<table class="table table-hover" style="margin-top: 19px;">
  <thead>
    <tr>
      <th scope="col">S NO </th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">DEPARTMENT</th>
      <th scope="col">ROLE ASSIGN</th>
      <th scope="col" colspan="3">ACTION</th>
    </tr>
  </thead>
  <tbody>
    
    <!-- php retrive coode -->
           <?php 
  
   // create connection
  $sql = "SELECT * FROM `users` ORDER BY `id` DESC ";
  $stmt =  $conn->prepare($sql);
  $stmt->execute();
      if( is_object($stmt) && $stmt->rowCount() > 0){
           
             
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sno =1;
            // echo '<pre>';
             foreach ($result as $data) {
               // print_r($data['name']);die;
              ?>
                    <tr>
                          <td><?= $sno++; ?> </td>
                          <td><?= $data['name']; ?></td>
                          <td><?= $data['email']; ?></td>
                          <td><?= $data['dept']; ?></td>
                          <td><?= $data['role']; ?></td>
                          <td>
                            <a href="edit-user.php?id=<?= $data['id'];?>">edit</a>|
                            <a href="dashboard.php?del_id=<?= $data['id'];?>">delete</a>
                          </td>
                        </tr>
              <?php
             }
             
       } else {
            echo '<tr>
                      <td colspan="6" class="text-center text-danger text-capitalize"> no users found</td>
                   </tr>';

       }
  
   ?>
    <!-- php retrive code -->
  </tbody>
      
</table> 
<!-- table end -->


  </div>  <!-- containser end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  </body>
</html>
<?php 
// code for delete user

if (isset($_GET['del_id'])) {
      // create connection
  $sql = "DELETE FROM `users` WHERE `users`.`id` = :u_del_id ";
  $stmt =  $conn->prepare($sql);
  $stmt->execute([':u_del_id'=> $_GET['del_id']]);
      if( is_object($stmt) ) {
                  $_SESSION['message']="succcessfully deleted";
                  
                   echo '<script>
                      window.location.assign(" http://localhost/EMS/admin/dashboard.php")
                   </script>';
            
      }
} 


 ?>