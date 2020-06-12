<?php
session_start();
  if(!isset($_SESSION['user'])){
  /*
  if the user is not logged in head them back to the index page 
  for appropriate authorization 
  */
  header("location:../.");

  
  }
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
  <script type="text/javascript" src="select_date.js"></script>
  </head>
<body>
	<div class="container">
  <h1 class="display-1 text-justify text-danger">iCare </h1>
  <h1 class="display-4 text-left">Appointment Booking</h1>
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
 $result=mysqli_query($connection,"SELECT * FROM schedule_tbl");
 $i=0;
 ?>
 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book</th>
      <th scope="col">Last Name</th>
      <th scope="col">Other Names</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
 <?php
 $user=$_SESSION['user'];
  while($row=mysqli_fetch_array($result)){
  	$i++;
    $book_id = $row['id'];
    $check_id = mysqli_query($connection, "SELECT * FROM appointment_tbl WHERE book_id='$book_id'") or die(mysqli_error($connection));
      $check = mysqli_query($connection, "SELECT * FROM temp_tbl WHERE book_id='$book_id' AND patient_email='$user'") or die(mysqli_error($connection));
 ?>
 <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php if(mysqli_num_rows($check_id)== 0){ ?><input class="form-check-input" name="<?php echo $row['id']; ?>" type="checkbox" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"
       onclick='return select_date(this.value);' <?php if(mysqli_num_rows($check)){ ?> checked='checked'<?php } } ?> </td>
      <td><?php echo $row['lname']; ?></td>
      <td><?php echo $row['oname']; ?></td>
      <td><?php echo $row['dates']; ?></td>
      <td><?php echo $row['time']; ?></td>
    </tr>

<?php 
}
?>
</tbody>
</table>
<p><a class="navbar-brand" href="confirm_appointment.php">Confirm Appointment</a></p>
  </div>
  </body>
</html>