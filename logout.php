	<?php
	/*
	if the user is not logged in head them back to the index page 
	for appropriate authorization 
	*/
		session_start();
		if(!isset($_SESSION['user'])){
		header("location:.");
	}

		if(session_destroy()){
	  	unset($_SESSION['user']);
	  	header('location:.');
		}
?>