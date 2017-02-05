<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

	// Check if user are logged in
	if (isset($_SESSION["login"]["uid"])) {

		$pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
		$uid = $_SESSION["login"]["uid"];
		$countVote = dbGet($connection, "SELECT * FROM votes WHERE votes.pid = '$pid' AND votes.uid = '$uid'", true);
		$votes = $connection->query("SELECT * FROM votes WHERE uid = $uid");
		$result = $connection->query("SELECT * FROM votes WHERE pid = $pid");

		// Check if the user already voted on post
		if ($countVote["up"] === '1' || $countVote["down"] === '-1') {
			$_SESSION["error"] = "You can only vote once";
			return false;

		} else {

			// When up voting
	    if (isset($_POST["upvote"])) {

				// Input upvote in database
				if (!dbPost($connection, "INSERT INTO votes (pid, uid, up) VALUES ('$pid', '$uid', true)")) {
					$_SESSION["error"] = "Something went wrong with the database request.";
					return false;
				} else {
					$_SESSION["message"] = "Your upvote has successfully been updated!";
				}
			}

			// When down voting
			if (isset($_POST["downvote"])) {

				// Input downvote in database
				if (!dbPost($connection, "INSERT INTO votes (pid, uid, down) VALUES ('$pid', '$uid', false)")) {
					$_SESSION["error"] = "Something went wrong with the database request.";
					return false;
				} else {
					$_SESSION["message"] = "Your downvote has successfully been updated!";
				}
			}
		}
	// Error message if not logged in
	} else {
		$_SESSION["error"] = "You need to be logged in to be able to vote.";
	}
}
