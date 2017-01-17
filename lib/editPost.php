<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $description = mysqli_real_escape_string($connection, $_POST["editDescription"]);
    $link = mysqli_real_escape_string($connection, $_POST["editLink"]);
    $subject = mysqli_real_escape_string($connection, $_POST["editSubject"]);
    $pid = mysqli_real_escape_string($connection, $_POST["votePid"]);

    //print_r($pid);

    if (isset($_POST["submitEdit"])) {


        if (!empty($_POST["editSubject"])) {
            if (!dbPost($connection, "UPDATE posts SET subject = '$subject' WHERE id = '$pid'")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your subject has successfully been updated!";
            }
        }

        if (!empty($_POST["editLink"])) {
            if (!dbPost($connection, "UPDATE posts SET link = '$link' WHERE id = '$pid'")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your link has successfully been updated!";
            }
        }

        if (!empty($_POST["editDescription"])) {
            if (!dbPost($connection, "UPDATE posts SET description = '$description' WHERE id = '$pid'")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
                return false;
            } else {
                $_SESSION["message"] = "Your description has successfully been updated!";
            }
        }
    }
}