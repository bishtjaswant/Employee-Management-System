<?php 
include '../authentication/auth.php';
require_once '../config/db.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <!-- material bootstrap -->
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    <title>employee management system</title>
  </head>
  <body>
   

   <!-- header -->
<?php include_once './includes/header.php'; ?>





<!-- container start-->
<div class="container">

      <h2>My Task</h2> 

      <table class="table table-bordered table-hover">
         <thead>
           <tr>
           <th scope="col">S NO</th>
           <th scope="col">TASK</th>
           <th> ASSIGNED AT </th>
           <th colspan="3" scope="col">ACTION</th>
         </tr>
         </thead>
         <tbody>
    
    <!-- php retrive coode -->
           <?php 
  
   // create connection
  $sql = "SELECT * FROM `tasks` WHERE `tasks`.`emp_id` =:emp_id  ";
  $stmt =  $conn->prepare($sql);
  $stmt->execute([':emp_id'=> $_SESSION['currently_logged_user_id']]);
      if( is_object($stmt) && $stmt->rowCount() > 0){
           
             
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sno =1;
            // echo '<pre>';
             foreach ($result as $data) {
               // print_r($data['name']);die;
              ?>
                    <tr>
                          <td><?= $sno++; ?> </td>
                          <td><?= substr( $data['message'], 0, 55); ?> </td> 
                          <td><?= $data['assigned_at'] ?></td>
                          <td>
                            <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#viewMessage">view message</button>
                            
                          </td>
                        </tr>
              <?php
             }
             
       } else {
            echo '<tr>
                      <td colspan="6" class="text-center text-danger text-capitalize"> no task available for me </td>
                   </tr>';

       }
  
   ?>
    <!-- php retrive code -->
  </tbody>

      </table>


      <!-- message modal -->
<div class="modal fade" role="dialog" id="viewMessage">

<form action="./employee-message-reply.php" id="formSendReply" method="POST">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">View Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
           <div class="row">
            <!-- displaying messsage -->
              <div class="col-md-12"> 
                <?php 
          // get admin's message in modal
            $sql = "SELECT `tasks`.`message`, `tasks`.`id` FROM `tasks` WHERE `tasks`.`emp_id` =:emp_id  ";
            $stmt =  $conn->prepare($sql);
            $stmt->execute([':emp_id'=> $_SESSION['currently_logged_user_id']]);
            if($stmt->rowCount()>0){
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
           echo <<<ADMINMESSAGE
                <p style="background-color:#f9f9f9;">{$row['message']} </p>
ADMINMESSAGE;
        }
           ?>
             
           </div>
           </div>
<hr>
           <div class="row mt-3">
             <!-- send reply -->
             <div class="col-md-3">
               <label for="" class="col-lg-2 control-label"> <h2>Write your reply</h2></label>
             </div>
             <div class="col-md-9">
              <input type="hidden" name="employee_id" id="employee_id" value="<?=$_SESSION['currently_logged_user_id']?>">
              <input type="hidden" name="message_id" id="message_id" value="<?=$row['id']?>">
               <textarea name="reply" id="reply" cols="15" class="form-control" placeholder="write a message" rows="10"></textarea>
               <output id="reply_error">  </output>
             </div>
             <!-- errror reesponse -->
             <output id="response"> </output>
           </div> 
              
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="send_reply" class="btn btn-primary">Send message</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</form>

</div>
      <!-- message modal end here -->

</div><!-- containser end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script>
      jQuery(document).ready(function($) {
      
            $("#reply").blur(function(event) {
                   if ($("#reply").val()=='') {
                    $("#reply_error").addClass('text-danger');
                    $("#reply_error").html("<p> please write a message </p>");
                    return false;
                   } 
            });

// send reply
            $("#formSendReply").submit(function(event) {
                  event.preventDefault();
                  if ($("#reply").val() !='') {
                    const data  = {
                        employee_id:  $("#employee_id").val(),
                        message_id:  $("#message_id").val(),
                        reply:  $("#reply").val(),
                    }
                    // console.log(data);return false;
                      $.ajax({
                        url: $(this).attr('action' ),
                        method: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function (resonse) {
                          $("#response").addClass('text-success');
                          $("#response").html('<p> message sent</p>');
                          $("#reply").val('');
                        }
                      });
                      
                  } 
                    else {
                    alert('please write a message');
                  }
            });


      
      });
    </script>
  </body>
</html>
 