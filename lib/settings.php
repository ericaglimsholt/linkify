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

  if (!dbPost($connection, "UPDATE users SET email = '$email' WHERE id = '$uid'")) {
      $_SESSION["error"] = "Something went wrong with the database request.";
  } else {
      $_SESSION["message"] = "Your settings has successfully been updated!";
  }
}
