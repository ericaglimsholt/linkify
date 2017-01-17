<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["upvote"])) {

        $up = mysqli_real_escape_string($connection, $_POST["upvote"]);
        $pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
        $uid = $_SESSION["login"]["uid"];

        if (!dbPost($connection, "INSERT INTO votes (pid, uid, up, down) VALUES ('$pid', '$uid', '$up', '$down')")) {
            $_SESSION["error"] = "Something went wrong with the database request.";
            return false;
        } else {
            $_SESSION["message"] = "Your upvote has successfully been updated!";
        }
    }

    if (isset($_POST["downvote"])) {

        $down = mysqli_real_escape_string($connection, $_POST["downvote"]);
        $pid = mysqli_real_escape_string($connection, $_POST["votePid"]);
        $uid = $_SESSION["login"]["uid"];

        if (!dbPost($connection, "INSERT INTO votes (pid, uid, down) VALUES ('$pid', '$uid', '$down')")) {
            $_SESSION["error"] = "Something went wrong with the database request.";
            return false;
        } else {
            $_SESSION["message"] = "Your downvote has successfully been updated!";
        }
    }
}