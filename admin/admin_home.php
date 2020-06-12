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
  $fetch=mysqli_query($connection,"SELECT * FROM admin_tbl WHERE email='$user_check'");
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
  <h1 class="display-5 text-left">Admin Dashboard </h1>
 </div>

  <div class="container jumbotron jumbotron-fluid"> 	
     <div class="row col">
    <p class="text-success">Welcome! <?php echo $myrow['lname'] . " " . $myrow['oname']?> </p>
 </div>
 <p></p>
 <div class="row col">
<nav class="nav flex-column">
  <a class="nav-link active" href="staff.php">Staff Registration</a>
  <a class="nav-link" href="update_user.php">Update User Profile</a>
  <a class="nav-link" href="../logout.php" onclick="return sure()">Logout</a>
</nav>
</div>
</div>
</body>
</html>