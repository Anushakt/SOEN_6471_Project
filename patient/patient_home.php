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
  $fetch=mysqli_query($connection,"SELECT * FROM patient_tbl WHERE email='$user_check'");
  $myrow=mysqli_fetch_array($fetch);
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
    var result=confirm("Do you really want to log out?");
    if(result == false){
      return false;
    }
  }
  
  </script> 
</head>
<body>

<div class="container">
  <h1 class="display-1 text-justify text-danger">iCare </h1>
  <h1 class="display-5 text-left">Patient Dashboard </h1>
  <div class="row">
  <div class="col-md-6">
  	<p class="text-success">Welcome! <?php echo $myrow['lname'] . " " . $myrow['oname']?> </p>
 </div>
<div class="col-md-6">
<form class="form-inline my-2 my-lg-0" action="#">
      <input class="form-control mr-sm-2" type="search" placeholder="Doctor Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
</div>
  <div class="row col jumbotron jumbotron-fluid"> 	
<nav class="nav flex-column">
  <a class="nav-link active" href="doctor_profile.php">Doctor Profile</a>
  <a class="nav-link" href="booking.php">Book Appointment</a>
  <a class="nav-link" href="myprofile.php">My Profile</a>
  <a class="nav-link" href="../logout.php" onclick="return sure()">Logout</a>
</nav>
</div>
</div>
</body>
</html>