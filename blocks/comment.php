<?php

$comments = dbGet($connection, "SELECT * FROM comments, posts WHERE comments.pid = posts.id");

foreach ($comments as $comment) {

}

$posts = dbGet($connection, "SELECT * FROM posts, users WHERE posts.uid = users.id");

// Shows all the posts
foreach ($posts as $post) {

}

// New query for getting all the posts from database
$posts = dbGet($connection, "SELECT * FROM posts, users WHERE posts.uid = users.id ORDER BY published DESC");

// Shows all the posts
foreach ($posts as $post) {

}

?>
    <hr>
    <div class="showComments">

        <img src="../img/erica.jpg" alt="Avatar">
        <h7><a href="#"> <?= $comment["uid"]; ?></a> commented: <?= $comment["comment"]; ?> </h7>
    </div>

<?php if (isset($_SESSION["login"]["uid"])): ?>

    <form name="registerComment" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="comments">
            <img src="../img/erica.jpg" alt="Avatar">

            <?php

            echo "<input name=\"postId\" type=\"hidden\" value=\"" . $post["id"] . "\">";
            ?>
            <!--          <input type="hidden" name="postId" value="--><?//= echo $post["id"] ?><!--">-->
            <input name="writeComment" type="text" placeholder="Write you comment">

            <input type="submit" name="commentButton" value="✓">
            <div class="del"><input type="button" name="commentDeleteButton" value="x"></div>
        </div>
    </form>
<?php endif; ?>