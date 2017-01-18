<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $pid = mysqli_real_escape_string($connection, $_POST["deletePid"]);

    // Deleting votes connected to post
    if (!dbPost($connection, "DELETE FROM comments WHERE pid = '$pid';")) {
        $_SESSION["error"] = "Something went wrong with the database request.";
        return false;
    } else {
        $_SESSION["message"] = "Your post has successfully been deleted!";
    }

    // Deleting votes connected to votes
    if (!dbPost($connection, "DELETE FROM votes WHERE pid = '$pid';")) {
        $_SESSION["error"] = "Something went wrong with the database request.";
        return false;
    } else {
        $_SESSION["message"] = "Your post has successfully been deleted!";
    }

    // Deleting post
    if (!dbPost($connection, "DELETE FROM posts WHERE id = '$pid';")) {
        $_SESSION["error"] = "Something went wrong with the database request.";
        return false;
    } else {
        $_SESSION["message"] = "Your post has successfully been deleted!";
    }

}
