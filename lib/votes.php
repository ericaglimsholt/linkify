<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["upvote"])) {

        $up = mysqli_real_escape_string($connection, $_POST["upvote"]);
        $pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
        $uid = $_SESSION["login"]["uid"];

        $result = $connection->query("SELECT * FROM votes WHERE pid = $pid");
        $rowCount = $result->num_rows;

        if ($rowCount > 0) {

            if (!dbPost($connection, "UPDATE votes SET up = '$up' +1 WHERE pid = '$pid'")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your upvote update has successfully been updated!";
            }

        } else {

            if (!dbPost($connection, "INSERT INTO votes (pid, uid, up, down) VALUES ('$pid', '$uid', '$up', '$down')")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your upvote has successfully been updated!";
            }
        }
    }

    if (isset($_POST["downvote"])) {

        $down = mysqli_real_escape_string($connection, $_POST["downvote"]);
        $pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
        $uid = $_SESSION["login"]["uid"];

        $result = $connection->query("SELECT * FROM votes WHERE pid = $pid");
        $rowCount = $result->num_rows;

        if ($rowCount > 0) {

            if (!dbPost($connection, "UPDATE votes SET down = '$down' -1 WHERE pid = '$pid'")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your downvote update has successfully been updated!";
            }

        } else {

            if (!dbPost($connection, "INSERT INTO votes (pid, uid, down) VALUES ('$pid', '$uid', '$down')")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your downvote has successfully been updated!";
            }
        }
    }
}