<?php 
session_start();
session_regenerate_id(true);
// impoted database conn
require_once '../config/db.php';

// logiin query
if ( isset($_REQUEST['login'])) { 

	   $email = htmlspecialchars(strip_tags( $_POST['email']));
    $password = htmlspecialchars(strip_tags( $_POST['password']))  ;


 $sql = "SELECT * FROM `users` WHERE `users`.`email`  = :email ";

 // check email
 $sth = $conn->prepare($sql);

  if (is_object($sth)) {
  	  $sth->bindParam(':email', $email, PDO::PARAM_STR);
      $sth->execute();
      if ($sth->rowCount()>0) {
      	  // now check usser's passwords
      	  $db_password = $sth->fetch(PDO::FETCH_ASSOC);
      	  
      	  if (password_verify($password, $db_password['password'])) {
      	  	echo 'login';
      	  } else {
      	     $_SESSION['message']="incorrect password write right password";
		   session_regenerate_id(true);
			header('Location: http://localhost/EMS/login.php');
      	  }
      }
      else {
          $_SESSION['message']="email doees not found to our system";
		   session_regenerate_id(true);
			header('Location: http://localhost/EMS/login.php');

      }
  }







}













