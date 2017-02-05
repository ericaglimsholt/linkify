<div class="rate">


    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype=multipart/form-data>




        <input name="votePid" type="hidden" value="<?= $postid; ?>">

        <input type="image" name="upvote" value="" src="/../img/hej.png" />
        <?php

        $votesInfo = dbGet($connection, "SELECT * FROM votes INNER JOIN posts ON posts.id = votes.pid");

				//$votes = dbGet($connection, "SELECT * FROM votes")

        foreach ($votesInfo as $vote) {
            $uid = $vote["uid"];
            $pid = $vote["pid"];
            $up = $vote["up"];
            $down = $vote["down"];
            //$qty = $up + $down;
						//$qty = $up - (-1 * $down);

						//$qty = intval($up) + intval($down);
						$qty = intval($up + $down);

            ?>

            <input class="qty" value="<?= $qty; ?>"/>
            <?php
        }
        ?>

        <input type="image" name="downvote" value="" src="/../img/downvote.png">


    </form>



</div>
