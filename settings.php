<?php
    require __DIR__.'/autoload.php';
    require __DIR__.'/blocks/login.php';
    require __DIR__.'/blocks/head.php';
    require __DIR__.'/lib/settings.php';
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

    <form class="settingForm" action="settings.php" method="post" enctype=multipart/form-data>

    <h3>Upload profile avatar</h3>
    <div class="settingAvatar" value="">
    </div>
    <input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg">

    <h3>Edit bio information</h3>
    <input type="text" name="settingInformation" value="<?= $post["bio"]; ?>" placeholder="Looks like you don't have any information saved">

    <h3>Edit email</h3>
    <input type="email" name="settingEmail" value="<?= $post["email"]; ?>">

    <h3>New password</h3>
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
