<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $action = $_POST["action"];

    if ($action === "createPost") {
        $_SESSION["error"] = 'Ja.';

        if (!isset($_POST["newSubject"]) || empty($_POST["newSubject"])) {
            $_SESSION["error"] = "Missing post subject.";
        }

        $uid = $_SESSION["login"]["uid"];
        $subject = $_POST["newSubject"];
        $link = $_POST["newLink"];
        $date = date("Y-m-d H:i:s");

        dbPost($connection, "INSERT INTO posts (uid, subject, link, published) VALUES ('$uid', '$subject', '$link', '$date')");
    }

} else {
    $_SESSION["message"] = "Success! You have now shared a new link.";
    return true;

}
