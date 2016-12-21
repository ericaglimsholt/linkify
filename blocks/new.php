<div class="container">
    <div class="post">
    <a target="_blank" href="<?= $post["link"]; ?>"> <h2><?= $post["subject"]; ?> </h2></a>
    <p><?= $post["description"]; ?></p>

        <h6>Author: <a href="#"><?= $post["username"]; ?></a> | Published: <?= $post["published"]; ?>
            <?php if (isset($_SESSION["login"]["uid"])): ?>
                | <a href="#">Comment</a>
            <?php endif; ?>
        </h6>

    </div>
</div>

<div class="container">
<div class="comments">
    <img src="../img/erica.jpg" alt="Avatar">
    <input name="writeComment" type="text" placeholder="Write you comment">
    <input type="submit" name="commentButton" value="Comment">
</div>
</div>