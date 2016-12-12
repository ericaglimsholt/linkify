<?php

require("database.php");

// Validates a given email, first to be of a valid format and then against the database.
function validateEmail($connection, $registerEmail)
{
    $valid = true;
    if (!filter_var($registerEmail, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
    } else {
        if (dbGet($connection, "SELECT id FROM users WHERE email = '$registerEmail'", true)) {
            $valid = false;
        }
    }

    return $valid;
}

// Validates a given username against the users table in the database
function validateUsername($connection, $registerUsername)
{
    if (dbGet($connection, "SELECT id FROM users WHERE username = '$registerUsername'", true)) {
        return false;
    }
    return true;
}

// Takes an array of values and returns it with the values escaped
function escapeData($connection, $items)
{
    foreach ($items as $i => $item) {
        $items[$i] = mysqli_real_escape_string($connection, $item);
    }
    return $items;
}


function registerUser($connection, $registerFullname, $registerUser, $registerEmail, $registerPassword)
{
    // Escape all the data received from the user
    list($registerFullname, $registerUser, $registerEmail, $registerPassword) = escapeData($connection, [$registerFullname, $registerUser, $registerEmail, $registerPassword]);

    // Validate the given
    if (!validateEmail($connection, $registerEmail)) {
        //session_start();
        $_SESSION["error"] = "The email you provided was invalid or already in use.";
        return false;
    }

    // Validate the given username
    if (!validateUsername($connection, $registerUser)) {
      //  session_start();
        $_SESSION["error"] = "The username you provided is already in use.";
        return false;
    }

    // Hash the given password
    $password = password_hash($registerPassword, PASSWORD_BCRYPT);

    // Check if registration succeeded, if not add error message
    //session_start();
    if (!dbPost($connection, "INSERT INTO users (username, email, password, name) VALUES ('$registerUser', '$registerEmail', '$registerPassword', '$registerFullname')")) {
        $_SESSION["error"] = "Registration failed. Please try again later.";
        return false;
    } else {
        $_SESSION["message"] = "Success! You are now registered and can log into Tweetbook.";
        return true;
    }
}
