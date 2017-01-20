<?php

// When the form is posted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!empty($_POST["commentButton"])) {

            $pid = $_POST["postId"];
            $comments = mysqli_real_escape_string($connection, $_POST["writeComment"]);
            $uid = $_SESSION["login"]["uid"];
            $date = date("Y-m-d H:i:s");

            // Create a new comment in database
            if (!dbPost($connection, "INSERT INTO comments (pid, uid, comment, published) VALUES ('$pid', '$uid', '$comments', '$date')")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
            } else {
                $_SESSION["message"] = "Your comment has successfully been posted!";
            }
        }
}