<?php

	//INSERT QUERY

	$username = htmlentities($_POST['username']);
	$message = htmlentities($_POST['message']);

	$Statement = "INSERT INTO Messages(username, message, time) VALUES('" . $username . "', '" . $message . "', '" . strval(date("h:i:sa")) . "')" ;

	$conn -> query($Statement);

	$query = $conn -> query("SELECT * FROM Messages");

	if (!$query) {
		echo "Error (add.php): " . $conn -> error;
	} else {
		echo "<table>";
		$previousMessage = "";

		while ($row = $query -> fetch_assoc()) {
			if ($_POST["username"] == $row["username"]) {
				echo html_entity_decode("<tr><td class='leftUN'></td><td class='leftM'></td><td class='rightM'>" . $row['message'] . "</td></tr>");
			} elseif ($previousMessage == $row["username"]) {
				echo html_entity_decode("<tr><td class='leftUN'></td><td class='leftM'>" . $row['message'] . "</td><td class='rightM'></td></tr>");
			} else {
				echo html_entity_decode("<tr><td class='leftUN'>" . $row['username'] . "</td><td class='leftM'>" . $row['message'] . "</td><td class='rightM'></td></tr>");
			}

			$previousMessage = $row["username"];
		}

		echo "</table>";
	}

?>
