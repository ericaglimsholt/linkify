<?php
    require __DIR__.'/autoload.php';
    require __DIR__.'/blocks/login.php';
    require __DIR__.'/blocks/head.php';
    require __DIR__.'/lib/newpost.php';
    require __DIR__.'/lib/newcomment.php';


?>

<html>

    <body>

    <?php

    // The header
    require __DIR__.'/blocks/header.php';

    // If the user are logged in they can write and post a new link
    if(isset($_SESSION["login"]["uid"])) {
        require __DIR__.'/blocks/writepost.php';
    }

    require __DIR__.'/blocks/new.php';


    ?>
    <!--  Scripts for handeling comments and edit post -->
    <script src="../js/comment.js"></script>
    <script src="../js/editPost.js"></script>

    <footer></footer>

    </body>

</html>
