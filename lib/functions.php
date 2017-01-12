<?php

// Validates a given email, first to be of a valid format and then against the database.
function validateEmail($connection, $registerEmail)
{
    $valid = true;

    // Check if the email is validate
    if (!filter_var($registerEmail, FILTER_VALIDATE_EMAIL)) {
        $valid = false;

    } else {

        // Register the email to database
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
        $_SESSION["error"] = "The email you provided was invalid or already in use.";
        return false;
    }

    // Validate the given username
    if (!validateUsername($connection, $registerUser)) {
        $_SESSION["error"] = "The username you provided is already in use.";
        return false;
    }

    // Hash the given password
    $registerPassword = password_hash($registerPassword, PASSWORD_BCRYPT);

    // Check if registration succeeded, if not add error message
    //session_start();
    if (!dbPost($connection, "INSERT INTO users (username, email, password, name) VALUES ('$registerUser', '$registerEmail', '$registerPassword', '$registerFullname')")) {
        $_SESSION["error"] = "Registration failed. Please try again later.";
        return false;
    } else {
        $_SESSION["message"] = "Success! You are now registered and can log into Linkify.";
        return true;
    }
}


// Authenticates a user and logs him/her into the platform.
function loginUser($connection, $username, $password)
{
    // Escapes the username and password given by the user.
    list($username, $password) = escapeData($connection, [$username, $password]);

    // Retrieve the user based on the email or username given by the user.
    $user = dbGet($connection, "SELECT * FROM users WHERE email = '$username' OR username = '$username'", true);
    if ($user) {
        // User matched with email or username, validate password
        if (password_verify($password, $user["password"])) {
            return $user["id"];
        }
    }
    $_SESSION["error"] = "Invalid username, email or password.";
    return false;
}

function validateUserPassword($connection, $uid, $password)
{
    $hash = dbGet($connection, "SELECT password FROM users WHERE id = '$uid'", true)["password"];
    return password_verify($password, $hash);
}


function imageName ($length = 32)
{
    $string = "";
    $chars = array_merge(range("A", "Z"), range("a", "z"), range(0, 9));
    for ($i = 0; $i < $length; $i++) {
        $string .= $chars[array_rand($chars)];
    }
    return $string;
}

function uploadImage ($connection, $imageInfo, $type, $uid)
{
    $name = imageName() . strrchr($imageInfo["name"], ".");
    if (!move_uploaded_file($imageInfo["tmp_name"], "../img/users/$uid/$name")) {
        $_SESSION["error"] = "There was a problem uploading your image.";
    } else {
        if ($type === "avatar") {
            move_uploaded_file($imageInfo["tmp_name"], "../img/users/$uid/$name");
            dbPost($connection, "UPDATE users SET avatar = '$name' WHERE id = '$uid'");
            $_SESSION["message"] = "Your avatar has successfully been updated!";
        }
    }
}