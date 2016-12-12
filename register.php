<html>

  <head>
    <?php
      require("blocks/head.php");
      require("lib/functions.php");


    ?>
  </head>

  <body>
    <?php

    require("blocks/header.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      if ($_POST["registerFullname"] !== "" && $_POST["registerUsername"] !== "" && $_POST["registerEmail"] !== "" && ["registerPassword"] !== "") {

        registerUser($connection, $_POST["registerFullname"], $_POST["registerUsername"], $_POST["registerEmail"], $_POST["registerPassword"]);

      } else {

        session_start();
      }
      die();
    }


    $error = $_SESSION["error"] ?? "";
    $message = $_SESSION["message"] ?? "";
    ?>


    <div class="container">

      <form class="registerForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <h1>Register a new user</h1>

        <div class="inputRegister">
          <p>Full name:</p>
          <input type="text" name="registerFullname" value="" placeholder="John Doe">
        </div>

        <div class="inputRegister">
          <p>Username:</p>
          <input type="text" name="registerUsername" value="" placeholder="johndoe">
        </div>

        <div class="inputRegister">
          <p>Email:</p>
          <input type="email" name="registerEmail" value="" placeholder="johndoe@service.com">
        </div>

        <div class="inputRegister">
          <p>Password:</p>
          <input type="password" name="registerPassword" value="" placeholder="Password1234">
        </div>

        <input type="submit" name="registerButton" value="Register to Linkify">


      </form>

    </div>

  </body>

</html>
