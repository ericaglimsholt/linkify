<?php

require("database.php");

function registerUser($connection, $registerFullname, $registerUser, $registerEmail, $registerPassword)
{
    // Escape all the data received from the user
    list($registerFullname, $registerUser, $registerEmail, $registerPassword) = escapeData($connection, [$registerFullname, $registerUser, $registerEmail, $registerPassword]);

    // Validate the given emailhehehehehgit p
    // YAPPP
    if (!validateEmail($connection, $registerEmail)) {
        session_start();
        $_SESSION["error"] = "The email you provided was invalid or already in use.";
        return false;
    }

    // Validate the given username
    if (!validateUsername($connection, $registerUser)) {
        session_start();
        $_SESSION["error"] = "The username you provided is already in use.";
        return false;
    }

    // Hash the given password YAY
    $password = password_hash($registerPassword, PASSWORD_BCRYPT);

    // Check if registration succeeded, if not add error message
    session_start();
    if (!dbPost($connection, "INSERT INTO users (username, email, password, name) VALUES ('$registerUser', '$registerEmail', '$registerPassword', '$registerFullname')")) {
        $_SESSION["error"] = "Registration failed. Please try again later.";
        return false;
    } else {
        $_SESSION["message"] = "Success! You are now registered and can log into Tweetbook.";
        return true;
    }
}
