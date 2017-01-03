<?php

// Specifies the id for the inlogged user
$id = $_SESSION["login"]["uid"];

// New query for getting all the information we want, to the right user, from database
$posts = dbGet($connection, "SELECT * FROM users WHERE '$id' = users.id");

// Shows all the information
foreach ($posts as $post) {

}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Check if the passwords matches
  if ($_POST['settingPassword1']!= $_POST['settingPassword2'])
  {
      // Error message
      $_SESSION["error"] = "Oops! Password did not match! Try again.";
      return false;
  } else {

    $uid = $_SESSION["login"]["uid"];
    $password = password_hash($_POST["settingPassword1"], PASSWORD_BCRYPT);

        if (!dbPost($connection, "UPDATE users SET password = '$password' WHERE id = '$uid'")) {
            $_SESSION["error"] = "Something went wrong with the database request.";
        } else {
            $_SESSION["message"] = "Your password has successfully been changed.";
        }
  }

  $uid = $_SESSION["login"]["uid"];
  $email = mysqli_real_escape_string($connection, $_POST["settingEmail"]);
  $bio = (isset($_POST["settingInformation"])) ? mysqli_real_escape_string($connection, $_POST["settingInformation"]):"";

  if (!dbPost($connection, "UPDATE users SET email = '$email', bio = '$bio' WHERE id = '$uid'")) {
      $_SESSION["error"] = "Something went wrong with the database request.";
  } else {
      $_SESSION["message"] = "Your settings has successfully been updated!";
  }


}
