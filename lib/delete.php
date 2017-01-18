<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $pid = mysqli_real_escape_string($connection, $_POST["deletePid"]);

    if (!dbPost($connection, "DELETE FROM posts WHERE id = '$pid';")) {
        $_SESSION["error"] = "Something went wrong with the database request.";
        return false;
    } else {
        $_SESSION["message"] = "Your post has successfully been deleted!";
    }

}