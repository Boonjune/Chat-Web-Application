<?php

	//CONNECT TO DATABASE
	$conn = new mysqli('localhost', 'web', 'p@sSword1', 'Chat_Service');

	if ($conn -> connect_errno) {
		echo "Error: " . $conn -> connect_error;
	}

?>