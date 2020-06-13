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

<div class="container-fluid">
<?php
session_start();
include('connection.php');
$fail = "";
if(isset($_POST['login'])){
$user = $_POST['user'];
$username = $_POST['username'];
$password = $_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = trim(mysqli_real_escape_string($connection,$username));
$password = trim(mysqli_real_escape_string($connection,$password));
switch ($user) {
  case 1:
   $staff=mysqli_query($connection,"SELECT * FROM staff_tbl WHERE password='$password' AND email='$username'");
      if($rows = mysqli_num_rows($staff)) {
          if ($rows == 1) {
          $_SESSION['user']=$username;
             if(isset($_SESSION['user'])){
               header("location:staff/doctor_home.php");
   }
   }
   
}else{
     $fail = "<div class=\"alert alert-danger\" role=\"alert\">
  You have entered wrong username or password!
</div>";
   }

    break;
  
  case 2:
    $patient=mysqli_query($connection,"SELECT * FROM patient_tbl WHERE password='$password' AND email='$username'");
      if($rows = mysqli_num_rows($patient)) {
          if ($rows == 1) {
          $_SESSION['user']=$username;
             if(isset($_SESSION['user'])){
               header("location:patient/patient_home.php");
   }
   }
} else{
     $fail = "<div class=\"alert alert-danger\" role=\"alert\">
  You have entered wrong username or password!
</div>";
   }

    break;

    case 3:
     $admin=mysqli_query($connection,"SELECT * FROM admin_tbl WHERE password='$password' AND email='$username'");
      if($rows = mysqli_num_rows($admin)) {
          if ($rows == 1) {
          $_SESSION['user']=$username;
             if(isset($_SESSION['user'])){
               header("location:admin/admin_home.php");
   }
   }
   
}
else{
     $fail = "<div class=\"alert alert-danger\" role=\"alert\">
  You have entered wrong username or password!
</div>";
   }

    break;

  default:
    $fail = "<div class=\"alert alert-danger\" role=\"alert\">
  You have selected the wrong user type!
</div>";
    break;
}
}

?>
  <?php echo $fail; ?>
 <form action="" method="post">
  <div class="form-group">
    <label for="email">Username:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email" required="required" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" required="required" name="password">
  </div>
   <div class="form-group">
    <label for="pwd">User Type:</label>
  <select class="custom-select" name="user">
  <option selected>Select user type</option>
  <option value="1">Staff</option>
  <option value="2">Patient</option>
  <option value="3">Admin</option>
</select>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" name="login" class="btn btn-success">Sign In</button>
  <p></p>
  <p></p>
  </form>
  <form action="patient/patient.php">
 <p class="text-info">If you are a new user click <button type="submit" class="btn btn-outline-success btn-lg">Sign up</button></p>
 </form>

</div>
</div>

</body>
</html>