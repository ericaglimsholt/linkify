<?php

    require __DIR__.'/autoload.php';
    require __DIR__.'/blocks/head.php';
    require __DIR__.'/lib/newuser.php';

?>

<html>

  <body>

    <?php require("blocks/header.php"); ?>

    <!--    REGISTER FORM   -->

    <div class="container">

      <form class="registerForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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

          <div class="inputRegister">
              <p>Re-enter password:</p>
              <input type="password" name="registerPassword2" value="" placeholder="Password1234">
          </div>

        <input type="submit" name="registerButton" value="Register to Linkify">

          <?php

          require("blocks/error.php");
          require("blocks/message.php");

          ?>


      </form>

    </div>

  </body>

</html>
