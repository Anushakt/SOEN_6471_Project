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
  <h1 class="display-5 text-left">Update User Profile </h1>
 </div>
<div class="container">
  <form action="admin_home.php">
 <button type="submit" class="btn btn-outline-success btn-lg">Back to Dashboard</button>
 <p></p>
  <p></p>
</form>
<form action="" method="post">
 <div class="form-group">
    <label for="pwd">Email:</label>
    <input type="email" class="form-control" placeholder="Enter user's email" id="pwd" required="required" name="email">
  </div>
   <div class="form-group">
    <label for="pwd">User Type:</label>
  <select class="custom-select" name="user">
  <option selected>Select user type</option>
  <option value="1">Staff</option>
  <option value="2">Patient</option>
</select>
  </div>
   <button type="submit" name="view" class="btn btn-success">View</button>
  <p></p>
  <p></p>
</form>
<?php
if(isset($_POST['view'])){
$email = $_POST['email'];
$user = $_POST['user'];
switch ($user) {
  case 1:
    $fetch=mysqli_query($connection,"SELECT * FROM staff_tbl WHERE email='$email'")or die(mysqli_error($connection));
  if($myrow=mysqli_fetch_array($fetch)){
   
   ?>
   <table class="table table-dark">
    <thead>
      <form action="staff_update.php" method="post">
      <tr><th></th><td class="text-info">Personal Information</td></tr>
      <tr><th>Last Name</th><td><input type="text" class="form-control" required="required" name="lname" value="<?php echo $myrow['lname']; ?>"></td></tr>
      <tr><th>Other Names</th><td><input type="text" class="form-control" required="required" name="oname" value="<?php echo $myrow['oname']; ?>"></td></tr>
      <tr><th>Email</th><td><input type="text" class="form-control" required="required" name="email" value="<?php echo $myrow['email']; ?>"></td></tr>
      <tr><th>Sex</th><td><?php echo $myrow['sex']; ?></td></tr>
      <tr><th></th><td class="text-info">Date of Birth</td></tr>
      <tr><th>Day</th><td><input type="text" class="form-control" required="required" name="day" value="<?php echo $myrow['day']; ?>"></td></tr>
      <tr><th>Month</th><td><input type="text" class="form-control" required="required" name="month" value="<?php echo $myrow['month']; ?>"></td></tr>
      <tr><th>Year</th><td><input type="text" class="form-control" required="required" name="year" value="<?php echo $myrow['year']; ?>"></td></tr>
      <tr><th></th><td class="text-info">Profession and Department</td></tr>
      <tr><th>Specialty</th><td><input type="text" class="form-control" required="required" name="specialty" value="<?php echo $myrow['specialty']; ?>"></td></tr>
      <tr><th>Department</th><td><input type="text" class="form-control" required="required" name="department" value="<?php echo $myrow['department']; ?>"></td></tr>
      <tr><th></th><td class="text-info">Address Information</td></tr>
      <tr><th>Address</th><td><input type="text" class="form-control" required="required" name="address" value="<?php echo $myrow['address']; ?>"></td></tr>
      <tr><th>City</th><td><input type="text" class="form-control" required="required" name="city" value="<?php echo $myrow['city']; ?>"></td></tr>
      <tr><th>State</th><td><input type="text" class="form-control" required="required" name="state" value="<?php echo $myrow['state']; ?>"></td></tr>
      <tr><th>Postal code</th><td><input type="text" class="form-control" required="required" name="zip" value="<?php echo $myrow['zip']; ?>"></td></tr>
       <tr><th></th><td>
 <button type="submit" class="btn btn-primary" name="update">Update</button>
 <input type="hidden" value="<?php echo $myrow['sn']; ?>" name="update"></td></tr>

    </thead>

    
    </form>
</table>
  <?php
}else{
     echo "<div class=\"alert alert-danger\" role=\"alert\">
  The email you have entered doesn't exist in the record!
</div>";
   }
   
    break;
  
  case 2:
    $fetchs=mysqli_query($connection,"SELECT * FROM patient_tbl WHERE email='$email'")or die(mysqli_error($connection));
  if($row=mysqli_fetch_array($fetchs)){
?>

 <table class="table table-dark">
    <thead>
    
      <form action="patient_update.php" method="post">
      <tr><th></th><td class="text-info">Personal Information</td></tr>
      <tr><th>Last Name</th><td><input type="text" class="form-control" required="required" name="lname" value="<?php echo $row['lname']; ?>"></td></tr>
      <tr><th>Other Names</th><td><input type="text" class="form-control" required="required" name="oname" value="<?php echo $row['oname']; ?>"></td></tr>
      <tr><th>Email</th><td><input type="text" class="form-control" required="required" name="email" value="<?php echo $row['email']; ?>"></td></tr>
      <tr><th>Sex</th><td><?php echo $row['sex']; ?></td></tr>
      <tr><th>Height</th><td><input type="text" class="form-control" required="required" name="height" value="<?php echo $row['height']; ?>"></td></tr>
      <tr><th>Weight</th><td><input type="text" class="form-control" required="required" name="weight" value="<?php echo $row['weight']; ?>"></td></tr>
      <tr><th></th><td class="text-info">Date of Birth</td></tr>
      <tr><th>Day</th><td><input type="text" class="form-control" required="required" name="day" value="<?php echo $row['day']; ?>"></td></tr>
      <tr><th>Month</th><td><input type="text" class="form-control" required="required" name="month" value="<?php echo $row['month']; ?>"></td></tr>
      <tr><th>Year</th><td><input type="text" class="form-control" required="required" name="year" value="<?php echo $row['year']; ?>"></td></tr>
      <tr><th></th><td class="text-info">Address Information</td></tr>
      <tr><th>Address</th><td><input type="text" class="form-control" required="required" name="address" value="<?php echo $row['address']; ?>"></td></tr>
      <tr><th>City</th><td><input type="text" class="form-control" required="required" name="city" value="<?php echo $row['city']; ?>"></td></tr>
      <tr><th>State</th><td><input type="text" class="form-control" required="required" name="state" value="<?php echo $row['state']; ?>"></td></tr>
      <tr><th>Postal code</th><td><input type="text" class="form-control" required="required" name="zip" value="<?php echo $row['zip']; ?>"></td></tr>
      <tr><th></th><td>
 <button type="submit" class="btn btn-primary" name="updates">Update</button>
 <input type="hidden" value="<?php echo $row['sn']; ?>" name="updates"></td></tr>
    </thead>

    
 </form>   
</table>
<?php

} else{
     echo "<div class=\"alert alert-danger\" role=\"alert\">
  The email you have entered doesn't exist in the record!
</div>";
   }

    break;

    default:
    echo  "<div class=\"alert alert-danger\" role=\"alert\">
  You have selected the wrong user type!
</div>";
    break;
}

}
?>
  
  </div>
</body>
</html>
