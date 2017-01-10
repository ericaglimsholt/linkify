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
