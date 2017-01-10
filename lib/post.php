<?php
// New query for getting all the posts from database
$posts = dbGet($connection, "SELECT * FROM posts, comments WHERE posts.id = comments.pid");

// Shows all the posts
foreach ($posts as $post) {

}