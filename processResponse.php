<?php
	/*
		This file needs to send the users interpretation of the response to the database. We get all the data that 
		has been sent using the Ajax query and store them in PHP variables. 
	*/
	$talk = $_POST['message'];
	$botchat = $_POST['marvinSaid'];
	$evaluation = $_POST['rating'];
	/*
		We need to establish a connection to the database and insert the interaction into a suitable place.
		The connection below is connected to the database called "AiChatBot", running of the localhost with the user and password both 
		set as "root".
	
		The query below is a simple INSERT query that inserts the record into the database table.
	*/	
	
	@ $db = new mysqli('localhost', 'root', 'root', 'AiChatBot');
		if (mysqli_connect_errno()) {
			echo 'Error: Could not connect to database.  Please try again later.';
			exit;
		}
	$q1 = "INSERT INTO `AiChatBot`.`interactions` (`interactionID`, `query`, `response`, `responsePerception`, `date`) VALUES (NULL, '$talk', '$botchat', '$evaluation', CURRENT_TIMESTAMP);";
	$result = $db->query($q1);	
	echo "Happy Days";
?>