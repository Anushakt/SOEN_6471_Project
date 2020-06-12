
<?php
session_start();
  if(!isset($_SESSION['user'])){
  /*
  if the user is not logged in head them back to the index page 
  for appropriate authorization 
  */
  header("location:../.");

  }

  $user=$_SESSION['user'];
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
    var result=confirm("Do you really want to book the Appointment(s)?");
    if(result == false){
      return false;
    }
  }
  
  </script> 
  </head>
<body>
	<div class="container">
  <h1 class="display-1 text-justify text-danger">iCare </h1>
  <h1 class="display-4 text-left">Reconfirm Appointment </h1>
  <p></p>
  <p></p>
  <div class="row col-md-12">
  	<?php //echo $success; ?>
   <form action="patient_home.php">
 <button type="submit" class="btn btn-outline-success btn-lg">Back to Dashboard</button>
 <p></p>
  <p></p>
 </form>
 
 <?php
 include('../connection.php');
 $result=mysqli_query($connection,"SELECT * FROM temp_tbl WHERE patient_email='$user'");
 $i=0;
 ?>
 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Last Name</th>
      <th scope="col">Other Names</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
 <?php
  while($row=mysqli_fetch_array($result)){
    $book_id = $row['book_id'];
  	$i++;
     $check_id = mysqli_query($connection, "SELECT * FROM appointment_tbl WHERE book_id='$book_id'") or die(mysqli_error($connection));
 ?>
 <tbody>
  <?php if(mysqli_num_rows($check_id)== 0){ ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['lname']; ?></td>
      <td><?php echo $row['oname']; ?></td>
      <td><?php echo $row['dates']; ?></td>
      <td><?php echo $row['time']; ?></td>
    </tr>

<?php 
}
}
?>
</tbody>
</table>
 <form action="" method="post">
 <button type="submit" class="btn btn-outline-success btn-lg" name="save" onclick="return sure()">Save Appointment</button>
 </form>

<?php
if(isset($_POST['save'])){
$result=mysqli_query($connection,"SELECT * FROM temp_tbl WHERE patient_email='$user'");
 while($row=mysqli_fetch_array($result)){
    $book_id = $row['book_id'];
    $lname = $row['lname'];
    $oname = $row['oname'];
    $date = $row['dates'];
    $time = $row['time'];


$check_id = mysqli_query($connection, "SELECT * FROM appointment_tbl WHERE book_id='$book_id'") or die(mysqli_error($connection));
if(mysqli_num_rows($check_id)== 0){ 
$pick_book = mysqli_query($connection,"INSERT INTO appointment_tbl(book_id,lname,oname,patient_email,dates,time,book_date)VALUES('$book_id','$lname','$oname',
  '$user','$date','$time',now())") or die(mysqli_error($connection));
   $delete = mysqli_query($connection," DELETE FROM temp_tbl WHERE book_id='$book_id'") or die(mysqli_error($connection));
  echo  "<div class=\"alert alert-success\" role=\"alert\">
  Your Appointment(s) have been booked!
</div>";

header("refresh: 3");
    }
}
}
?>
  </div>
  </body>
</html>