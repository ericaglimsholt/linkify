<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

	// Check if user are logged in
	if (isset($_SESSION["login"]["uid"])) {
		$pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
		$uid = $_SESSION["login"]["uid"];

		$countVote = dbGet($connection, "SELECT * FROM votes WHERE votes.pid = '$pid' AND votes.uid = '$uid'", true);
		$votes = $connection->query("SELECT * FROM votes WHERE uid = $uid");
		$result = $connection->query("SELECT * FROM votes WHERE pid = $pid");

		if ($countVote["up"] === '1') {
			$_SESSION["error"] = "You can only vote once";
			return false;

			if ($countVote["down"] === '-1') {
				$_SESSION["error"] = "You can only vote once";
				return false;
			}
		} else {

			// When up voting
	    if (isset($_POST["upvote"])) {

	        $up = mysqli_real_escape_string($connection, $_POST["upvote"]);
	        $pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
	        $uid = $_SESSION["login"]["uid"];

					$countVote = dbGet($connection, "SELECT * FROM votes WHERE votes.pid = '$pid' AND votes.uid = '$uid'", true);
					$votes = $connection->query("SELECT * FROM votes WHERE uid = $uid");
	        $result = $connection->query("SELECT * FROM votes WHERE pid = $pid");

						// Create a row to votes with value
						if (!dbPost($connection, "INSERT INTO votes (pid, uid, up) VALUES ('$pid', '$uid', '$up')")) {
								$_SESSION["error"] = "Something went wrong with the database request.";
								return false;
						} else {
								$_SESSION["message"] = "Your upvote has successfully been updated!";
						}
			}

			// When down voting
			if (isset($_POST["downvote"])) {

					$down = mysqli_real_escape_string($connection, $_POST["downvote"]);
					$pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
					$uid = $_SESSION["login"]["uid"];

					$result = $connection->query("SELECT * FROM votes WHERE pid = $pid");


							// Create a row to votes with value
							if (!dbPost($connection, "INSERT INTO votes (pid, uid, down) VALUES ('$pid', '$uid', '$down')")) {
									$_SESSION["error"] = "Something went wrong with the database request.";
									return false;
							} else {
									$_SESSION["message"] = "Your downvote has successfully been updated!";
							}
			}

		}

  //  }

	} else {
		$_SESSION["error"] = "You need to be logged in to be able to vote.";
	}


}
