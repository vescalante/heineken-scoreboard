<?php
	$conn = new mysqli('localhost', 'heineken_scoreadm', 'Ifj#506C6pTW', 'heineken_scoreboard');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>