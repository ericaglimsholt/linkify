<html>

  <head>
    <?php require("blocks/head.php"); ?>
  </head>

  <body>
    <?php require("blocks/header.php"); ?>

    <div class="container">

      <form class="registerForm" action="#" method="post">
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

        <input type="button" name="registerButton" value="Register to Linkify">


      </form>

    </div>

  </body>

</html>
