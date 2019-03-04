<?php 
session_start();
session_regenerate_id(true);
// impoted database conn
require_once '../config/db.php';



// insert queery for register

if ( isset($_REQUEST['task'])) {
    $message = htmlspecialchars(strip_tags( $_POST['message']));  
    
    $employeeList  = $_POST['emp'];

    $assign_by = htmlspecialchars(strip_tags($_POST['currently_logged_user_id']));

    // print_r($_POST);
 
    $sql = "INSERT INTO `tasks`( `emp_id`, `message`, `assigned_by` ) VALUES ( :myemp, :msg, :a_by) ";
  $sth =  $conn->prepare($sql);
  if (is_object($sth)) {

      foreach ($employeeList as $emp) {
		      	      $sth->bindParam(':myemp', $emp, PDO::PARAM_INT);
		      	      $sth->bindParam(':msg', $message, PDO::PARAM_STR);
						$sth->bindParam(':a_by', $assign_by, PDO::PARAM_INT); 
						$sth->execute();
				
      }

            		if ($sth->rowCount() > 0) {
							$_SESSION['message']="Task assigned " ;
							session_regenerate_id(true);
							header('Location:  http://localhost/EMS/admin/task.php');
						} else {
						   $_SESSION['message']="failed try  again later";
						   session_regenerate_id(true);
							header('Location:  http://localhost/EMS/admin/task.php');
						}

		
  }
}
/*else{
	header("Location: http://localhost/EMS?message=you cant accesss thiis page directly&status=false");
}*/