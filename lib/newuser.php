<?php

// When the form is posted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check if the passwords matches
    if ($_POST['registerPassword']!= $_POST['registerPassword2'])
    {
        // Error message
        $_SESSION["error"] = "Oops! Password did not match! Try again.";
        return false;
    }

    // Check if all the inputs are written
    if ($_POST["registerFullname"] !== "" && $_POST["registerUsername"] !== "" && $_POST["registerEmail"] !== "" && ["registerPassword"] !== "") {

        // Register the user to the database
        registerUser($connection, $_POST["registerFullname"], $_POST["registerUsername"], $_POST["registerEmail"], $_POST["registerPassword"]);
    }
}



