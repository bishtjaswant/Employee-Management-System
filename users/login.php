<?php 
session_start();
session_regenerate_id(true);
// impoted database conn
require_once '../config/db.php';


// echo password_hash("rajni123456", PASSWORD_DEFAULT);die;
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
      	  $db_user_credentials = $sth->fetch(PDO::FETCH_ASSOC);
      	  
      	  if (password_verify($password, $db_user_credentials['password'])) {
      	  	// print_r($db_user_credentials);
            // create a session id to auth the usert
            $_SESSION['user_auth'] = session_id();
            $_SESSION['currently_logged_user_id'] = $db_user_credentials['id'];
             // check for admin or user
            if ($db_user_credentials['role']==='admin') {
              header("Location:  http://localhost/EMS/admin/dashboard.php");
              $_SESSION['user_info']= [
                      "name" => $db_user_credentials['name'],
                      "department" => $db_user_credentials['dept']  ,             
                      "role" => $db_user_credentials['role']               
              ];
            } 
            else if($db_user_credentials['role']==='employee') {
              header("Location: http://localhost/EMS/employee/dashboard.php");
                    $_SESSION['user_info']= [
                      "name" => $db_user_credentials['name'],
                      "department" => $db_user_credentials['dept']  ,
                      "role" => $db_user_credentials['role']                     
              ];
            } else {
             $_SESSION['message']="sorry you have no permission to login dashboard";
               session_regenerate_id(true);
              header('Location: http://localhost/EMS/login.php');  
            }
      	  } else {
      	     $_SESSION['message']="incorrect password";
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













