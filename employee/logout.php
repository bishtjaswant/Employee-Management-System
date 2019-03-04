<?php include_once '../authentication/auth.php'; 

unset($_SESSION['user_auth']);;

unset($_SESSION['user_info']);


session_destroy(); 

header("Location: http://localhost/EMS/login.php");






?>