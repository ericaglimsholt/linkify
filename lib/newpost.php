<?php

// When the form is posted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // When the button is being pushed
    if (isset($_POST["linkButton"])) {

            // Check if the subject is missing (requirement)
            if (!isset($_POST["newSubject"]) || empty($_POST["newSubject"])) {

                // Output error message
                $_SESSION["error"] = "Missing post subject.";

            } else {

            $uid = $_SESSION["login"]["uid"];
            $subject = $_POST["newSubject"];
            $description = $_POST["newDescription"];
            $link = $_POST["newLink"];
            $date = date("Y-m-d H:i:s");

            // Register the new post to database
            dbPost($connection, "INSERT INTO posts (uid, subject, description, link, published) VALUES ('$uid', '$subject', '$description', '$link', '$date')");

            // Output success message
            $_SESSION["message"] = "Success! You have now shared a new link.";
        }
    }
}
