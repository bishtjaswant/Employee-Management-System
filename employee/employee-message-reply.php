<?php 
 
// impoted database conn
require_once '../config/db.php';
 
	// print_r($_POST['employee_id']);die;
 
if ( isset($_POST['reply'])) {
    $employee_id = htmlspecialchars(strip_tags( $_POST['employee_id']));  
    $message_id = htmlspecialchars(strip_tags( $_POST['message_id']));
    $reply = htmlspecialchars(strip_tags( $_POST['reply']));
 
    $sql = "INSERT INTO `task_reply`( `reply`, `employee_id`, `message_id` ) VALUES (:reply,:employee_id,:message_id)  ";
  $sth =  $conn->prepare($sql);
  if (is_object($sth)) {
      $sth->bindParam(':reply', $reply, PDO::PARAM_STR);
    $sth->bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
    $sth->bindParam(':message_id', $message_id, PDO::PARAM_STR); 
    $sth->execute();
    if ($sth->rowCount() > 0) {
      echo json_encode(['message'=> 'message sent']);
    } else {
       echo json_encode(['message'=> 'failed to send message']);
    }
    
  }
}




 ?>