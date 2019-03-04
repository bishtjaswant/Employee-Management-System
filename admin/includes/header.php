 
<header>
  
<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Employee management system (ADMIN)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/EMS/admin/dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="http://localhost/EMS/admin/leave.php">Leave</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="http://localhost/EMS/admin/register.php">Register</a>
      </li>
 <li class="nav-item">
        <a class="nav-link" href="http://localhost/EMS/admin/task.php">Task</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="http://localhost/EMS/admin/logout.php">Logout</a>
      </li>

   
      <li class="nav-item">
        <a class="nav-link" href="#"><?= strtoupper( $_SESSION['user_info']['name'] ); ?></a>
      </li>
    </ul>
 
  </div>
</nav>
<!-- navbaar  end here -->
</header>

