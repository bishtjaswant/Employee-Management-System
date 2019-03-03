<?php  

session_start();

echo 'welcome  '. $_SESSION['user_info']['name'] .' to employee dashboard';
