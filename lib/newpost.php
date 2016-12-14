<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["linkButton"])) {

            if (!isset($_POST["newSubject"]) || empty($_POST["newSubject"])) {
                $_SESSION["error"] = "Missing post subject.";
            } else {

            $uid = $_SESSION["login"]["uid"];
            $subject = $_POST["newSubject"];
            $link = $_POST["newLink"];
            $date = date("Y-m-d H:i:s");

            dbPost($connection, "INSERT INTO posts (uid, subject, link, published) VALUES ('$uid', '$subject', '$link', '$date')");
            $_SESSION["message"] = "Success! You have now shared a new link.";
        }
    }
}
