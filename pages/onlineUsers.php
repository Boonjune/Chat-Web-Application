<?php

	//QUERY

	$query = $conn -> query("SELECT * FROM Online_Users");

	if (!$query) {
		echo "Error (onlineUsers.php): " . $conn -> error;
	} else {
		echo "<h3>Current Users</h3>";
		echo "<p class='userlist'>";
		while ($row = $query -> fetch_assoc()) {
			echo " " . $row["username"] . " ";
		}
		echo "</p>";
	}
?>
