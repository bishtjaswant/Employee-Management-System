<?php 
session_start();
session_regenerate_id(true);
// impoted database conn
require_once '../config/db.php';



// insert queery for register

if ( isset($_REQUEST['register'])) {
    $name = htmlspecialchars(strip_tags( $_POST['name']));  
    $email = htmlspecialchars(strip_tags( $_POST['email']));
    $password = password_hash(htmlspecialchars(strip_tags( $_POST['password'])) ,PASSWORD_DEFAULT)  ;
    $role = htmlspecialchars(strip_tags($_POST['role']));
    $department = htmlspecialchars(strip_tags( $_POST['department']));
    $sql = "INSERT INTO `users`( `name`, `email`, `password`, `dept`,`role`) VALUES (:name,:email,:password,:dept,:role)";
  $sth =  $conn->prepare($sql);
  if (is_object($sth)) {
      $sth->bindParam(':name', $name, PDO::PARAM_STR);
		$sth->bindParam(':email', $email, PDO::PARAM_STR);
		$sth->bindParam(':password', $password, PDO::PARAM_STR);
		$sth->bindParam(':dept', $department, PDO::PARAM_STR);
		$sth->bindParam(':role', $role, PDO::PARAM_STR);
		$sth->execute();
		if ($sth->rowCount() > 0) {
			$_SESSION['message']="$name  registered as $role";
			session_regenerate_id(true);
			header('Location:  http://localhost/EMS/admin/register.php');
		} else {
		   $_SESSION['message']="failed try  again latrer";
		   session_regenerate_id(true);
			header('Location:  http://localhost/EMS/admin/register.php');
		}
		
  }
}
/*else{
	header("Location: http://localhost/EMS?message=you cant accesss thiis page directly&status=false");
}*/