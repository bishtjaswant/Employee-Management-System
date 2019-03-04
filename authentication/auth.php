<?php 

session_start();

if (!isset($_SESSION['user_auth'])) {
              header("Location: http://localhost/EMS/login.php");

}