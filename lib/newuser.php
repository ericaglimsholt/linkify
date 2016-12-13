<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST["registerFullname"] !== "" && $_POST["registerUsername"] !== "" && $_POST["registerEmail"] !== "" && ["registerPassword"] !== "") {

        registerUser($connection, $_POST["registerFullname"], $_POST["registerUsername"], $_POST["registerEmail"], $_POST["registerPassword"]);

    } else {

    }
}

