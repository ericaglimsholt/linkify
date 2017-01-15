<?php
if (isset($_POST["editpost"])) {
    $_SESSION["error"] = "Missing fields in login form! Make sure to fill out all fields.";
}

$users = dbGet($connection, "SELECT * FROM posts, users WHERE posts.uid = users.id ");
foreach ($users as $user) {

}

$comments = dbGet($connection, "SELECT * FROM comments, posts WHERE comments.pid = posts.id");

foreach ($comments as $comment) {

}

?>

<div class="container">

    <?php

    require("blocks/error.php");
    require("blocks/message.php");

    ?>
    <div class="post">
      <div class="rate">
        <a href="#" class="up" onclick="modify_qty(1)"><img src="/../img/upvote.png" alt=""></a>
        <input class="qty" value="0" />
        <a href="#" class="down" onclick="modify_qty(-1)"><img src="/../img/downvote.png" alt=""></a>
      </div>

    <a target="_blank" href="<?= $user["link"]; ?>"> <h2><?= $post["subject"]; ?> </h2></a>
    <p><?= $post["description"]; ?></p>


        <h6>Author: <a href="../profile.php"><?= $user["username"]; ?></a> | Published: <?= $user["published"]; ?>

          <!-- Om användaren är inloggad -->
            <?php if (isset($_SESSION["login"]["uid"])): ?>
                | <div class="commentBut"><a href="#">Comment</a></div>

                <!-- Om användaren har skrivit länken så syns detta -->
                 <?php if ($_SESSION["login"]["uid"] == $post["id"]): ?>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="submit" name="editPost" value="edit">
<!--                        |<button class="editPost" name="editPost">Edit</button>-->
                        |<button class="deletePost"><div class="deleteBut"><a href="#">Delete</a></div></h6></button>
                    </form>

                 <?php endif; ?>
            <?php endif; ?>
        </h6>

        <?php





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

        <?php  //require __DIR__.'/comment.php'; ?>
    </div>


</div>

<div class="container">


</div>





</script>
