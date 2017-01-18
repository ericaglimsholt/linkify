<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // When up voting
    if (isset($_POST["upvote"])) {

        $up = mysqli_real_escape_string($connection, $_POST["upvote"]);
        $pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
        $uid = $_SESSION["login"]["uid"];

        $result = $connection->query("SELECT * FROM votes WHERE pid = $pid");
        $rowCount = $result->num_rows;

        // Check if rows exists in database
        if ($rowCount > 0) {

            // Updates votes
            if (!dbPost($connection, "UPDATE votes SET up = '$up' +1 WHERE pid = '$pid'")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your upvote update has successfully been updated!";
            }

        } else {

            // Create a row to votes with value
            if (!dbPost($connection, "INSERT INTO votes (pid, uid, up) VALUES ('$pid', '$uid', '$up')")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your upvote has successfully been updated!";
            }
        }
    }

    // When down voting
    if (isset($_POST["downvote"])) {

        $down = mysqli_real_escape_string($connection, $_POST["downvote"]);
        $pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
        $uid = $_SESSION["login"]["uid"];

        $result = $connection->query("SELECT * FROM votes WHERE pid = $pid");
        $rowCount = $result->num_rows;

        // Check if rows exists in database
        if ($rowCount > 0) {

            // Updates votes
            if (!dbPost($connection, "UPDATE votes SET down = '$down' -1 WHERE pid = '$pid'")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your downvote update has successfully been updated!";
            }

        } else {

            // Create a row to votes with value
            if (!dbPost($connection, "INSERT INTO votes (pid, uid, down) VALUES ('$pid', '$uid', '$down')")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your downvote has successfully been updated!";
            }
        }
    }
}