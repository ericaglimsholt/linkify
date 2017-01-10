<?php
$uid = $_SESSION["login"]["uid"];
?>

<div class="container">
    <div class="post">
      <div class="rate">
        <a href="#" class="up" onclick="modify_qty(1)"><img src="/../img/upvote.png" alt=""></a>
        <input class="qty" value="0" />
        <a href="#" class="down" onclick="modify_qty(-1)"><img src="/../img/downvote.png" alt=""></a>
      </div>

    <a target="_blank" href="<?= $post["link"]; ?>"> <h2><?= $post["subject"]; ?> </h2></a>
    <p><?= $post["description"]; ?></p>

        <h6>Author: <a href="#"><?= $post["username"]; ?></a> | Published: <?= $post["published"]; ?>

          <!-- Om användaren är inloggad -->
            <?php if (isset($_SESSION["login"]["uid"])): ?>
                | <div class="commentBut"><a href="#">Comment</a></div>

                <!-- Om användaren har skrivit länken så syns detta -->
                 <?php if ($uid == $post["id"]): ?>
                | <div class="editBut"><a href="#">Edit</a></div>
                | <div class="deleteBut"><a href="#">Delete</a></div>
               <?php endif; ?>

            <?php endif; ?>
        </h6>
        <?php  require __DIR__.'/comment.php'; ?>
    </div>


</div>

<div class="container">


</div>





</script>
