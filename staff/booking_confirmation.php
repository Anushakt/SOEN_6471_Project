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
  <h1 class="display-4 text-left">Booking confirmation </h1>
  <p></p>
  <p></p>
  <div class="row col-md-12">
  	<?php //echo $success; ?>
   <form action="doctor_home.php">
 <button type="submit" class="btn btn-outline-success btn-lg">Back to Dashboard</button>
 <p></p>
  <p></p>
 </form>
 
 <?php
 include('../connection.php');
 $user = $_SESSION['user'];
 $result=mysqli_query($connection,"SELECT * FROM appointment_tbl WHERE patient_email='$user'") or die(mysqli_error($connection));
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
      <th scope="col">Confirm</th>
    </tr>
  </thead>
 <?php
  while($row=mysqli_fetch_array($result)){
  	$i++;
 ?>
 <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['lname']; ?></td>
      <td><?php echo $row['oname']; ?></td>
      <td><?php echo $row['dates']; ?></td>
      <td><?php echo $row['time']; ?></td>
      <td><?php 
            $approval = $row['approval']; 
          if($approval=='Confirmed'){
        echo $row['approval'];
        }else{
        
        ?>
        <form action="" method="post">
 <button type="submit" class="btn btn-primary" name="id" onclick="return sure()">Confirm</button>
 <input type="hidden" value="<?php echo $row['book_id']; ?>" name="id"> <?php } ?></form></td>
    </tr>

<?php 
}
?>
</tbody>
</table>
  </div>
  </body>
</html>
<?php
if(isset($_POST['id'])){
$id=$_POST['id'];
mysqli_query($connection,"UPDATE appointment_tbl SET approval='Confirmed' WHERE book_id='$id'" ) or die(mysqli_error($connection)); 
header("Refresh:3");
}
?>