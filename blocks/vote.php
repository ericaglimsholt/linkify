<div class="rate">


    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype=multipart/form-data>




        <input name="votePid" type="hidden" value="<?= $postid; ?>">

        <input type="image" name="upvote" value="+1" src="/../img/upvote.png" />
        <?php

        $votesInfo = dbGet($connection, "SELECT * FROM votes INNER JOIN posts ON posts.id = votes.pid");

        foreach ($votesInfo as $vote) {
            $uid = $vote["uid"];
            $pid = $vote["pid"];
            $up = $vote["up"];
            $down = $vote["down"];
            $qty = $up + $down;

            ?>

            <input class="qty" value="<?= $qty; ?>"/>
            <?php
        }
        ?>

        <input type="image" name="downvote" value="-1" src="/../img/downvote.png">


    </form>



</div>