 <?php
   include('../connection.php');
   if(isset($_POST['update'])){
  $success = '';
  $update = $_POST['update'];
  $lname = $_POST['lname'];
  $oname = $_POST['oname'];
  $email = $_POST['email'];
  $day = $_POST['day'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $specialty = $_POST['specialty'];
  $department = $_POST['department'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];

  mysqli_query($connection, "UPDATE staff_tbl SET lname='$lname',oname='$oname',email='$email',day='$day',month='$month',year='$year',specialty='$specialty',
    department='$department',address='$address',city='$city',state='$state',zip='$zip' WHERE sn = '$update'")or die(mysqli_error($connection));
echo "<div class=\"alert alert-success\" role=\"alert\">
  Record has been updated successfully!
</div>";

header("refresh:3; update_user.php");
}

   

   ?>