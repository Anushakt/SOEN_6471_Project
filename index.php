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