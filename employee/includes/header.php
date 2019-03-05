 
<header>
  
<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Employee management system (Employee)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/EMS/employee/dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="http://localhost/EMS/employee/leave.php">Leave</a>
      </li>

        
 <li class="nav-item">
        <a class="nav-link" href="http://localhost/EMS/employee/tasks.php">Task</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#employeeReplyModel">My reply</a>
      </li>




      <li class="nav-item">
        <a class="nav-link" href="http://localhost/EMS/employee/logout.php">Logout</a>
      </li>

   
      <li class="nav-item">
        <a class="nav-link" href="#"><?= strtoupper( $_SESSION['user_info']['name'] ); ?></a>
      </li>
    </ul>
 
  </div>
</nav>
<!-- navbaar  end here -->
</header>


<!-- show all employee's message in modal-->
 
 <div class="modal fade" id="employeeReplyModel" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">My reply history</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php 
 
 
   // $sql = "SELECT * FROM `task_reply` WHERE `task_reply`.`employee_id`  = :emp_id AND `task_reply`.`message_id` = m_id";
    $sql = "SELECT * FROM `task_reply` WHERE `task_reply`.`employee_id` =:emp_id";
  $sth =  $conn->prepare($sql);
  $sth->bindParam(':emp_id', $_SESSION['currently_logged_user_id'], PDO::PARAM_INT);
    // $sth->bindParam(':role', $role, PDO::PARAM_STR);
           if ($sth->execute()) {
                   $rows =  $sth->fetchAll(PDO::FETCH_ASSOC);
                   foreach ($rows as $reply) {
                     echo <<<REPLY
                     <ul>
                            <li> {$reply['reply']} </li>
                     </ul>
REPLY;
                   }
           }
 
         ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- show all employee's message in modal-->
