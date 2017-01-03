<?php
    require __DIR__.'/autoload.php';
    require __DIR__.'/blocks/login.php';
    require __DIR__.'/blocks/head.php';

    // Specifies the id for the inlogged user
    $id = $_SESSION["login"]["uid"];

    // New query for getting all the information we want, to the right user, from database
    $posts = dbGet($connection, "SELECT * FROM users WHERE '$id' = users.id");

    // Shows all the information
    foreach ($posts as $post) {

    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $uid = $_SESSION["login"]["uid"];
      $email = mysqli_real_escape_string($connection, $_POST["settingEmail"]);

      if (!dbPost($connection, "UPDATE users SET email = '$email' WHERE id = '$uid'")) {
          $_SESSION["error"] = "Something went wrong with the database request.";
      } else {
          $_SESSION["message"] = "Your settings has successfully been updated!";
      }
    }

?>

<html>

    <body>

    <?php

    // The header
    require __DIR__.'/blocks/header.php';

    ?>
    <div class="container">

    <h1>Your settings</h1>

    <?php

    require __DIR__.'/blocks/message.php';
    require __DIR__.'/blocks/error.php';

    ?>

    <form class="settingForm" action="settings.php" method="post">

    <h3>Upload profile avatar</h3>
    <input type="text" name="settingAvatar" value=""></br>
    <input type="file" name="settingPicture" accept="image/png, image/jpeg">

    <h3>Edit bio information</h3>
    <input type="text" name="settingInformation" value="" placeholder="Looks like you don't have any information saved">

    <h3>Edit email</h3>
    <input type="email" name="settingEmail" value="<?= $post["email"]; ?>">

    <h3>Edit password</h3>
    <input type="password" name="settingPassword1" value="" placeholder="Write your new password here">
    <input type="password" name="settingPassword2" value="" placeholder="Re-enter your new password here">

    <h3>Enter your currant password for save changes</h3>
    <div class="save">
      <input type="password" name="settingPassword" value="">
      <input type="submit" name="settingButton" value="Save changes">
    </div>

  </form>

    </div>
    </body>

</html>
