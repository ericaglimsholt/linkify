<?php

$comments = dbGet($connection, "SELECT * FROM comments, posts WHERE comments.pid = posts.id");

foreach ($comments as $comment) {

}

?>
<hr>
<div class="showComments">

    <img src="../img/erica.jpg" alt="Avatar">
    <h7><a href="#"> <?= $post["username"] ?></a> commented: <?= $comment["comment"]; ?> </h7>
</div>

<?php if (isset($_SESSION["login"]["uid"])): ?>
  <form name="registerComment" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="comments">
        <img src="../img/erica.jpg" alt="Avatar">

        <input type="hidden" name="postId" value="<?= $post["id"] ?>">
          <input name="writeComment" type="text" placeholder="Write you comment">
          <input type="submit" name="commentButton" value="✓">


        <div class="del"><input type="button" name="commentDeleteButton" value="x"></div>
    </div>
    </form>
<?php endif; ?>

