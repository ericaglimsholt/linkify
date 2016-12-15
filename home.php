<?php
    require __DIR__.'/autoload.php';
    require __DIR__.'/blocks/login.php';
    require __DIR__.'/blocks/head.php';
    require __DIR__.'/lib/newpost.php';
?>

<html>

    <body>

    <?php
        require __DIR__.'/blocks/header.php';
    ?>

    <?php if(isset($_SESSION["login"]["uid"])):  ?>

    <?php require __DIR__.'/blocks/writepost.php';?>

    <?php endif; ?>

    <?php

    $posts = dbGet($connection, "SELECT * FROM posts ORDER BY published DESC");

    foreach ($posts as $post) {
        require __DIR__.'/blocks/new.php';
    }

    ?>





    </body>

</html>
