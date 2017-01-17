<?php
// Check if comment button is being pushed
if (isset($_POST["commentButton"])) {
    require __DIR__.'/../lib/newcomment.php';
}

// Check if the submit edit is being pushed
if (isset($_POST["submitEdit"])) {
    require __DIR__.'/../lib/editPost.php';
}

// Check if the submit edit is being pushed
if (isset($_POST["upvote"]) || isset($_POST["downvote"])) {
    require __DIR__.'/../lib/votes.php';
}


// Error message for edit post
if (isset($_POST["editpost"])) {
    $_SESSION["error"] = "Missing fields in login form! Make sure to fill out all fields.";
}

// Query for get post information
$postInfo = dbGet($connection, "SELECT *, posts.id FROM posts INNER JOIN users ON users.id = posts.uid ORDER BY posts.published DESC;");

foreach($postInfo as $post) {
$postDescription = $post["description"];
$postLink = $post["link"];
$postSubject = $post["subject"];
$postPublished = $post["published"];
$postUsername = $post["username"];
$postAvatar = $post["avatar"];
$uid = $post["uid"];
$postid = $post["id"];

?>

<div class="container">

    <?php
    // Error and success message
    require("blocks/error.php");
    require("blocks/message.php");

    ?>

    <div class="post">

      <div class="rate">

          <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype=multipart/form-data>

              <input name="votePid" type="hidden" value="<?= $postid; ?>">

              <button type="submit" name="upvote" value="1">

<!--                 <a href="#" class="up" onclick="modify_qty(1)"><img src="/../img/upvote.png" alt=""></a>-->

              </button>

                <input class="qty" value="0" />

              <button type="submit" name="downvote" value="-1">

<!--                  <a href="#" class="down" onclick="modify_qty(-1)"><img src="/../img/downvote.png" alt=""></a>-->

              </button>

          </form>

      </div>

    <a target="_blank" href="<?= $postLink; ?>"> <h2><?= $postSubject; ?> </h2></a>
    <p><?= $postDescription; ?></p>

        <h6>Author: <a href="../profile.php"><?= $postUsername ?></a> | Published: <?= $postPublished ?>

          <!-- Om användaren är inloggad -->
            <?php if (isset($_SESSION["login"]["uid"])): ?>
                | <div class="commentBut"><a href="#">Comment</a></div>

                <!-- Om användaren har skrivit länken så syns detta -->
                 <?php if ($_SESSION["login"]["uid"] == $uid): ?>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                        | <div class="editPost"><a href="#">Edit</a></div>
<!--                        |<button class="editPost" name="editPost">Edit</button>-->
                        |<button class="deletePost"><div class="deleteBut"><a href="#">Delete</a></div></h6></button>
                    </form>

        <div class="editDiv">

            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype=multipart/form-data>
                <hr>


                <input name="editPid" type="hidden" value="<?= $postid; ?>">

                <h5>Edit subject:</h5>
                <input name="editSubject" type="text" value="<?= $postSubject; ?>">

                <h5>Edit link:</h5>
                <input name="editLink" type="text" value="<?= $postLink; ?>">

                <h5>Edit description:</h5>
                <input name="editDescription" type="text" value="<?= $postDescription; ?>">

                <input type="submit" name="submitEdit" value="Save"><div class="del"><input type="button" name="commentDeleteButton" value="x"></div>

            </form>
        </div>

                 <?php endif; ?>
            <?php endif; ?>
        </h6>

        <?php


        $commentInfo = dbGet($connection, "SELECT * FROM comments INNER JOIN users ON users.id = comments.uid ORDER BY published DESC;");

        foreach ($commentInfo as $comments) {
        $commentUid = $comments["uid"];
        $commentUsername = $comments["username"];
        $commentPid = $comments["pid"];
        $commentAvatar = $comments["avatar"];
        $commentDescription = $comments["comment"];
        ?>

            <?php if ($postid == $commentPid ): ?>
        <hr>
        <div class="showComments">


            <img src="../img/erica.jpg" alt="Avatar">
            <h7><a href="#"> <?= $commentUsername; ?></a> commented: <?= $commentDescription; ?> </h7>

        </div>
            <?php endif; ?>

            <?php
                }
        ?>

        <?php if (isset($_SESSION["login"]["uid"])): ?>

            <form name="registerComment" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="comments">
                    <img src="../img/erica.jpg" alt="Avatar">

                    <?php

                    echo "<input name=\"postId\" type=\"hidden\" value=\"" . $postid . "\">";
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

    <?php

}


?>

<div class="container">


</div>





</script>
