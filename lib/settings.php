<?php

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
  $bio = (isset($_POST["settingInformation"])) ? mysqli_real_escape_string($connection, $_POST["settingInformation"]):"";
  $password = password_hash($_POST["settingPassword1"], PASSWORD_BCRYPT);

  if (isset($_POST["settingButton"])) {

    // Check if you trying to save without password
    if (empty($_POST["settingPassword"])) {
			$_SESSION["error"] = "You can't change your setting without your currant password.";
		} else {

      // Check if you trying to save without valid password
      if (!validateUserPassword($connection, $_SESSION["login"]["uid"], $_POST["settingPassword"])) {
  			$_SESSION["error"] = "Invalid password.";
  		} else {

        // Save password changes to database
        if (!empty($_POST["settingPassword1"])) {
          if ($_POST['settingPassword1']!== $_POST['settingPassword2']) {
            $_SESSION["error"] = "Oops! Password did not match! Try again.";
            return false;
            } else {
              if (!dbPost($connection, "UPDATE users SET password = '$password' WHERE id = '$uid'")) {
                $_SESSION["error"] = "Something went wrong with the database request.";
              } else {
                $_SESSION["message"] = "Your changes has successfully been changed.";
              }
            }
        }

        // Save email changes to database
        if (!empty($_POST["settingEmail"])){
          if (!dbPost($connection, "UPDATE users SET email = '$email' WHERE id = '$uid'")) {
            $_SESSION["error"] = "Something went wrong with the database request.";
            return false;
          } else {
            $_SESSION["message"] = "Your changes has successfully been updated!";
          }
        }

        // Save bio info changes to database
        if (!empty($_POST["settingInformation"])){
          if (!dbPost($connection, "UPDATE users SET bio = '$bio' WHERE id = '$uid'")) {
            $_SESSION["error"] = "Something went wrong with the database request.";
            return false;
          } else {
            $_SESSION["message"] = "Your changes information has successfully been updated!";
          }
        }

      }
    }
  }
}
