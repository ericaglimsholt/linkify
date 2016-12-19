<?php
    require __DIR__.'/autoload.php';
    require __DIR__.'/blocks/login.php';
    require __DIR__.'/blocks/head.php';
    require __DIR__.'/lib/newpost.php';
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

    // New query for getting all the posts from database
    $posts = dbGet($connection, "SELECT * FROM posts ORDER BY published DESC");

    // Shows all the posts
    foreach ($posts as $post) {
        require __DIR__.'/blocks/new.php';
    }

    ?>

    </body>

</html>
