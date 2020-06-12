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
</head>
<body>
  <div class="container">
  <h1 class="display-1 text-justify text-danger">iCare </h1>
  <h1 class="display-5 text-left">My Profile </h1>
 </div>
<div class="container">
  <form action="patient_home.php">
 <button type="submit" class="btn btn-outline-success btn-lg">Back to Dashboard</button>
 <p></p>
  <p></p>
</form>
   <table class="table table-dark">
    <thead>
      <tr><th></th><td class="text-info">Personal Information</td></tr>
      <tr><th>Last Name</th><td><?php echo $myrow['lname']; ?></td></tr>
      <tr><th>Other Names</th><td><?php echo $myrow['oname']; ?></td></tr>
      <tr><th>Email</th><td><?php echo $myrow['email']; ?></td></tr>
      <tr><th>Sex</th><td><?php echo $myrow['sex']; ?></td></tr>
      <tr><th>Height</th><td><?php echo $myrow['height']; ?> CM</td></tr>
      <tr><th>Weight</th><td><?php echo $myrow['weight']; ?> LB</td></tr>
      <tr><th></th><td class="text-info">Date of Birth</td></tr>
      <tr><th>Day</th><td><?php echo $myrow['day']; ?></td></tr>
      <tr><th>Month</th><td><?php echo $myrow['month']; ?></td></tr>
      <tr><th>Year</th><td><?php echo $myrow['year']; ?></td></tr>
      <tr><th></th><td class="text-info">Address Information</td></tr>
      <tr><th>Address</th><td><?php echo $myrow['address']; ?></td></tr>
      <tr><th>City</th><td><?php echo $myrow['city']; ?></td></tr>
      <tr><th>State</th><td><?php echo $myrow['state']; ?></td></tr>
      <tr><th>Postal code</th><td><?php echo $myrow['zip']; ?></td></tr>

    </thead>

    <tbody>
    </tbody>
</table>
  </div>
</body>
</html>