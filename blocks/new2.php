<div class="post">
    <div class="rate">
        <a href="#" class="up" onclick="modify_qty(1)"><img src="img/upvote.png" alt=""></a>
        <input class="qty" value="0" />
        <a href="#" class="down" onclick="modify_qty(-1)"><img src="img/downvote.png" alt=""></a>
    </div>

    <a target="_blank" href="<?= $info["link"]; ?>"> <h2><?= $info["subject"]; ?> </h2></a>
    <p><?= $info["description"]; ?></p>


    <h6>Author: <a href="#"><?= $info["username"]; ?></a> | Published: <?= $info["published"]; ?>

        <!-- Om användaren är inloggad -->
        <?php if (isset($_SESSION["login"]["uid"])): ?>
        | <div class="commentBut"><a href="#">Comment</a></div>

        <!-- Om användaren har skrivit länken så syns detta -->
        <?php if ($_SESSION["login"]["uid"] == $info["id"]): ?>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="editPost" value="edit">
            <!--                        |<button class="editPost" name="editPost">Edit</button>-->
            |<button class="deletePost"><div class="deleteBut"><a href="#">Delete</a></div></h6></button>
    </form>

    <?php endif; ?>
    <?php endif; ?>
    </h6>
    <?php  require __DIR__.'/comment.php'; ?>

</div>