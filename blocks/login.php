<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verify that both username and password are not empty.

    if (isset($_POST["login"])) {

        if ($_POST["username"] !== "" && $_POST["password"] !== "") {

            // Both username and password is included, attempt to login the user
            if ($uid = loginUser($connection, $_POST["username"], $_POST["password"])) {

                $_SESSION["login"] = [
                    "uid" => $uid
                ];

            }
        } else {

            // There were missing fields, set an error and redirect to the authentication page.
            $_SESSION["error"] = "Missing fields in login form! Make sure to fill out all fields.";
        }
    }
}
