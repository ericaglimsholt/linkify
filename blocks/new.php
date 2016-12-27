<div class="container">
    <div class="post">
    <a target="_blank" href="<?= $post["link"]; ?>"> <h2><?= $post["subject"]; ?> </h2></a>
    <p><?= $post["description"]; ?></p>

        <h6>Author: <a href="#"><?= $post["username"]; ?></a> | Published: <?= $post["published"]; ?>
            <?php if (isset($_SESSION["login"]["uid"])): ?>
                | <div class="commentBut"><a href="#">Comment</a></div>
            <?php endif; ?>
        </h6>

    </div>
</div>

<script>

    document.querySelector('.commentBut').addEventListener("click", function(event){
        document.querySelector('.comments').style.display='flex';
        event.preventDefault();
    });

    document.querySelector(".del").addEventListener("click", function(){
        document.querySelector(".comments").style.display = "none";
    });

</script>

<div class="container">

    <?php  require __DIR__.'/comment.php'; ?>

</div>
