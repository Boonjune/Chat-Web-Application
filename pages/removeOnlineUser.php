<?php

	$user = $_POST["username"];

	//GET CURRENT TABLE
		
	$Statement = "SELECT * FROM Online_Users";

	$query = $conn -> query($Statement);

	$array = array();


	if (!$query) {
		echo "Error (New)" . $conn -> error;
	} else {
		//Gets current users
		$i = 0;
		while ($row = $query -> fetch_assoc()) {
			if ($row['username'] != $user) {
				$array[$i] = $row['username'];
				$i++;		
			}
		}
		
		sort($array);
		
		$conn -> query("DELETE FROM Online_Users");

		for ($i = 0; $i < count($array); $i++ ) {

			$query_val = "INSERT INTO Online_Users VALUES (" . $i . ", '" . $array[$i] . "')";
			
			$query = $conn -> query($query_val);
		}

		if (!$query) {
			echo "Error (addOnlineUser)" . $conn -> error;
		}		
		
		
	}
?>