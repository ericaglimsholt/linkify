<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // Check if the passwords matches
    if ($_POST['registerPassword']!= $_POST['registerPassword2'])
    {
        $_SESSION["error"] = "Oops! Password did not match! Try again.";
        return false;
    }

    if ($_POST["registerFullname"] !== "" && $_POST["registerUsername"] !== "" && $_POST["registerEmail"] !== "" && ["registerPassword"] !== "") {

        registerUser($connection, $_POST["registerFullname"], $_POST["registerUsername"], $_POST["registerEmail"], $_POST["registerPassword"]);

    }
}



