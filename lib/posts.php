<?php

    // New query for getting all the posts from database
     $posts = dbGet($connection, "SELECT * FROM posts, users WHERE posts.uid = users.id ORDER BY published DESC");

     // Shows all the posts
     foreach ($posts as $post) {
         require __DIR__.'/blocks/new.php';
     }

     ?>