<html>

  <head>

    <?php require("blocks/head.php");
    require("lib/functions.php");

      $error = $_SESSION["error"] ?? "";
      $message = $_SESSION["message"] ?? "";

    ?>
  </head>

  <body>
    <?php require("blocks/header.php"); ?>
  </body>

</html>
