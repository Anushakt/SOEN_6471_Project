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