<?php
	$conn = new mysqli("localhost","root","","dkkhoahoc");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>