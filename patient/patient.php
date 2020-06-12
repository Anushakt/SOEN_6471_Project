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
<?php  
include("../connection.php");
$success=$fail="";
if(isset($_POST['save'])){
  $lname = $_POST['lname'];
  $oname = $_POST['oname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sex = $_POST['sex'];
  $day = $_POST['day'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];


  $em = mysqli_query($connection, "SELECT * FROM patient_tbl WHERE email = '$email'")or die(mysqli_error($connection));
  if(mysqli_num_rows($em)==1){
    $fail = "<div class=\"alert alert-danger\" role=\"alert\">
  The email you entered already exist!
</div>";
}else{

  mysqli_query($connection, "INSERT INTO patient_tbl(lname,oname,email,password,sex,day,month,year,height,weight,address,city,state,zip)VALUES('$lname',
    '$oname','$email','$password','$sex','$day','$month','$year','$height','$weight','$address','$city','$state','$zip')")or die(mysqli_error($connection));
$success="<div class=\"alert alert-success\" role=\"alert\">
  You have registered successfully!
</div>";
}
}
?>