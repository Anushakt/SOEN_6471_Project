<?php
session_start();
  if(!isset($_SESSION['user'])){
  /*
  if the user is not logged in head them back to the index page 
  for appropriate authorization 
  */
  header("location:../.");

  }
  include('../connection.php');
  $user_check=$_SESSION['user'];
  $fetch=mysqli_query($connection,"SELECT * FROM staff_tbl WHERE email='$user_check'");
  $staff=mysqli_fetch_array($fetch);
  $success = " ";
  if(isset($_POST['save'])){
  $email = $staff['email'];
  $lname = $staff['lname'];
  $oname = $staff['oname'];
  $date = $_POST['date'];
  $time = $_POST['time'];
   mysqli_query($connection, "INSERT INTO schedule_tbl(lname,oname,email,dates,time)VALUES('$lname','$oname','$email','$date','$time')")or die(mysqli_error($connection));
$success="<div class=\"alert alert-success\" role=\"alert\">
  Appointment Saved successfully!
</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>iCare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
    function sure(){
    var result=confirm("Do you really want to schedule this appointment?");
    if(result == false){
      return false;
    }
  }
  
  </script> 
</head>
<body>
	<div class="container">
  <h1 class="display-1 text-justify text-danger">iCare </h1>
  <h1 class="display-4 text-left">Schedule Appointment </h1>
  <p></p>
  <p></p>
  <div class="row col-md-12">
   <form action="doctor_home.php">
 <button type="submit" class="btn btn-outline-success btn-lg">Back to Dashboard</button>
 </form>
  </div>
    <?php echo $success; ?>
<form action="" method="post">
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date</label>
      <input type="date" class="form-control" id="inputEmail4" required="required" name="date">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Time</label>
      <input type="time" class="form-control" id="inputPassword4" required="required" name="time">
    </div>
  </div>
  <button type="submit" name="save" class="btn btn-primary" onclick="return sure()">Save Schedule</button>
</form>

</div>

</body>
</html>