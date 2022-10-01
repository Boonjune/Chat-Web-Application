<?php

	//QUERY

	$query = $conn -> query("SELECT * FROM Messages");

	if (!$query) {
		echo "Error (messages.php): " . $conn -> error;
	} else {
		echo "<table>";
		$previousMessage = "";
		$nextMin = "";

		while ($row = $query -> fetch_assoc()) {
			if ($_POST["username"] == $row["username"]) {
				echo html_entity_decode("<tr><td class='leftUN'></td><td class='leftM'></td><td class='rightM'>" . $row['message'] . "</td></tr>");
				$placement = "right";
			} elseif ($previousMessage == $row["username"]) {
				echo html_entity_decode("<tr><td class='leftUN'></td><td class='leftM'>" . $row['message'] . "</td><td class='rightM'></td></tr>");
			} else {
				echo html_entity_decode("<tr><td class='leftUN'>" . $row['username'] . "</td><td class='leftM'>" . $row['message'] . "</td><td class='rightM'><td/></tr>");
			}

			$previousMessage = $row["username"];
			$previousMin = "";
		
		
				
			$tmp = str_split($row["time"]);

			if ($nextMin == "") {
				$nextMin = (intval( $tmp[3]. $tmp[4]) + 5);
			}
			$previousMin = intval($tmp[3] . $tmp[4]);
				

			if ($nextMin <= $previousMin) {
				echo "</table>";
				echo "<p class='centerprompt'>" . $row["time"] . "</p>";
				echo "<table>";

				$nextMin = "";
			} elseif ($nextMin > 60) {
				$nextMin = "";	
			}


		}
		echo "</table>";
	}
?>
