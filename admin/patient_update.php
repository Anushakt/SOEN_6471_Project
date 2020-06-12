<?php
include('../connection.php');
if(isset($_POST['updates'])){
  $updates = $_POST['updates'];
  $lname = $_POST['lname'];
  $oname = $_POST['oname'];
  $email = $_POST['email'];
  $day = $_POST['day'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];

mysqli_query($connection, "UPDATE patient_tbl SET lname='$lname',oname='$oname',email='$email',day='$day',month='$month',year='$year',height='$height',
  weight='$weight',address='$address',city='$city',state='$state',zip='$zip' WHERE sn='$updates'")or die(mysqli_error($connection));
echo "<div class=\"alert alert-success\" role=\"alert\">
   Record has been updated successfully!
</div>";

header("refresh:3; update_user.php");
}