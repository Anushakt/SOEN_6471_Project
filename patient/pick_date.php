<?php
session_start();
if(!isset($_SESSION['user'])){
header("location:../.");
}


include('../connection.php');

$user=$_SESSION['user'];
$book_id = $_GET['c'];
$pick = $_GET['s'];

if($pick=="check"){
$result = mysqli_query($connection,"SELECT * FROM schedule_tbl WHERE id='$book_id'") or die(mysqli_error($connection));
while($row=mysqli_fetch_array($result)){ 
$lname = $row['lname'];
$oname = $row['oname'];
$date = $row['dates'];
$time = $row['time'];

$pick_book = mysqli_query($connection,"INSERT INTO temp_tbl(book_id,lname,oname,patient_email,dates,time)VALUES('$book_id','$lname','$oname','$user','$date','$time')") or die(mysqli_error($connection));
}
}
else{
$delete = mysqli_query($connection," DELETE FROM temp_tbl WHERE book_id='$book_id' AND patient_email='$user'") or die(mysqli_error($connection));
}

?>
