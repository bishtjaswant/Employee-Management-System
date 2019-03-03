<?php 
session_start();

echo 'welcome  '. $_SESSION['user_info']['name'] .' to  admin dashboard';
