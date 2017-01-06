<div class="container">
    <div class="post">
      <div class="rate">
        <a href="#"><img src="/../img/upvote.png" alt=""></a>
        <a href="#"><img src="/../img/downvote.png" alt=""></a>
      </div>
    <a target="_blank" href="<?= $post["link"]; ?>"> <h2><?= $post["subject"]; ?> </h2></a>
    <p><?= $post["description"]; ?></p>

        <h6>Author: <a href="#"><?= $post["username"]; ?></a> | Published: <?= $post["published"]; ?>
            <?php if (isset($_SESSION["login"]["uid"])): ?>
                | <div class="commentBut"><a href="#">Comment</a></div>
                | <div class="editBut"><a href="#">Edit</a></div>
                | <div class="deleteBut"><a href="#">Delete</a></div>
            <?php endif; ?>
        </h6>

    </div>
</div>



<div class="container">

    <?php  require __DIR__.'/comment.php'; ?>

</div>

<script src="../js/comment.js"></script>

</script>
