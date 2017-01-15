<?php

// When the form is posted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // When the button is being pushed
    if (isset($_POST["commentButton"])) {

        // Check if the comment field is missing (requirement)
        if (!isset($_POST["writeComment"]) || empty($_POST["writeComment"])) {

            // Output error message
            $_SESSION["error"] = "Hey, don't try comment something blank.";

        } else {

            $pid = $_POST["postId"];
            $content = mysqli_real_escape_string($connection, $_POST["writeComment"]);
            $uid = $_SESSION["login"]["uid"];
            $date = date("Y-m-d H:i:s");


           //print_r($pid);

            dbPost($connection, "INSERT INTO comments (pid, uid, comment, published) VALUES ('$pid', '$uid', '$content', '$date')");

//            $pid = dbGet($connection, "SELECT id FROM posts");
//            $uid = $_SESSION["login"]["uid"];
//            $comment = $_POST["writeComment"];
//            $date = date("Y-m-d H:i:s");
//
//            // Register the new comment to database
//            dbPost($connection, "INSERT INTO comments (uid, pid, comment, published) VALUES ('$uid', '$pid', '$comment', '$date')");

        }
    }
}