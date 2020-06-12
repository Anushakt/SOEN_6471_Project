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
<div class="container">
  <h1 class="display-1 text-justify text-danger">iCare </h1>
  <div class="row">
    <div class="col-md-10">
  <h1 class="display-4 text-left">Sign Up </h1>
</div>
<div class="col-md-2">
   <form action="../index.php">
 <button type="submit" class="btn btn-outline-success btn-lg">Sign in</button>
 </form>
  </div>
</div>
  <?php echo $success; echo $fail; ?>
<form action="" method="post">
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Last Name</label>
      <input type="text" class="form-control" id="inputEmail4" required="required" name="lname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Other Name(s)</label>
      <input type="text" class="form-control" id="inputPassword4" required="required" name="oname">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" required="required" name="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" required="required" name="password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
  <div class="form-check">
  <input class="form-check-input" type="radio" name="sex" id="exampleRadios1" value="male" checked=checked>
  <label class="form-check-label" for="exampleRadios1">
    Male
  </label>
</div>
 </div>
  <div class="form-group col-md-2">
<div class="form-check">
  <input class="form-check-input" type="radio" name="sex" id="exampleRadios2" value="female">
  <label class="form-check-label" for="exampleRadios2">
    Female
  </label>
</div>
</div>
<div class="form-group col-md-8"></div>
</div>
<div class="form-row">
   <div class="form-group col-md-2">
      <label for="inputEmail4">Date of Birth: </label>
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Day</label>
      <input type="number" class="form-control" id="inputEmail4" required="required" name="day">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Month</label>
      <input type="number" class="form-control" id="inputPassword4" required="required" name="month">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Year</label>
      <input type="number" class="form-control" id="inputPassword4" required="required" name="year">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Height (cm)</label>
      <input type="text" class="form-control" id="inputEmail4" required="required" name="height">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Weight (lb)</label>
      <input type="text" class="form-control" id="inputPassword4" required="required" name="weight">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required="required" name="address">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" required="required" name="city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" required="required" name="state">
        <option selected>Choose...</option>
        <option value="quebec">Quebec</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" required="required" name="zip">
    </div>
  </div>
  <button type="submit" name="save" class="btn btn-primary">Sign Up</button>
</form>

</div>

</body>
</html>

<?php


?>