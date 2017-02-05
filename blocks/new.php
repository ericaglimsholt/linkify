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

// Check if the detele button is being pushed
if (isset($_POST["deletePid"])) {
    require __DIR__.'/../lib/delete.php';
}

$loggedIn = isset($_SESSION["login"]["uid"]);

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

	if(!function_exists('getVotes')) {

		function getVotes($connection, $postid){

			$votes = dbGet($connection, "SELECT * FROM votes WHERE pid = '$postid'");
			$counter = 0;

			foreach ($votes as $vote ) {
				if ($vote["up"] == true) {
					$counter += 1;
				} else {
					$counter -= 1;
				}

			}
echo $counter;
	}



}



    ?>

    <div class="post">

	    <div class="rate">

				<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype=multipart/form-data>

					 <!-- Hidden input with post id for the database later on -->
					 <input name="votePid" type="hidden" value="<?= $postid; ?>">

					 <!-- Up button -->
					 <input type="image" name="upvote" value="+1" src="/../img/upvote.png" />

							 <!-- Shows the currant value for votes -->
							 <p><?php getVotes($connection, $postid) ?></p>

					 <!-- Down button -->
					 <input type="image" name="downvote" value="-1" src="/../img/downvote.png">

			 </form>


	    </div>



    <!-- All posts -->
    <a target="_blank" href="<?= $postLink; ?>">
      <h2><?= $postSubject; ?></h2>
    </a>

    <p><?= $postDescription; ?></p>

    <h6>Author: <a href="<?= $postAvatar ?>"><?= $postUsername ?></a> | Published: <?= $postPublished ?>

    <!-- If user are logged in -->
    <?php if (isset($_SESSION["login"]["uid"])): ?>
        |
        <div class="commentBut"><a href="#">Comment</a></div>

        <!-- If user have written the post -->
        <?php if ($_SESSION["login"]["uid"] == $uid): ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                |
                <div class="editPost"><a href="#">Edit</a></div>
                |
                <input name="deletePid" type="hidden" value="<?= $postid; ?>">

                <input type="submit" name="deletePost" class="deleteBut" value="Delete" /></h6>
            </form>

            <!-- Edit post div -->
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

                    <input type="submit" name="submitEdit" value="Save">
                    <div class="del"><input type="button" name="commentDeleteButton" value="x"></div>

                </form>
            </div>

        <?php endif; ?>
    <?php endif; ?>
    </h6>

    <?php

    // Query for get comment information
    $commentInfo = dbGet($connection, "SELECT * FROM comments INNER JOIN users ON users.id = comments.uid ORDER BY published ASC;");

    foreach ($commentInfo as $comments) {
        $commentUid = $comments["uid"];
        $commentUsername = $comments["username"];
        $commentPid = $comments["pid"];
        $commentAvatar = $comments["avatar"];
        $commentDescription = $comments["comment"];

        ?>


        <?php if ($postid == $commentPid): ?>

            <hr>

            <!-- All comments -->
            <div class="showComments">

                <img src="../img/users/<?= $commentUid ?>/<?= $commentAvatar ?>" alt="Avatar">
                <h7><a href="#"> <?= $commentUsername; ?></a> commented: <?= $commentDescription; ?> </h7>

            </div>
        <?php endif; ?>

        <?php } ?>

        <?php if (isset($_SESSION["login"]["uid"])): ?>



            <!-- Write a new comment -->
            <form name="registerComment" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="comments">

                    <!-- Users avatar -->
                    <img src="../img/users/<?= $uid ?>/<?= $postAvatar ?>" alt="Avatar">

                    <input type="hidden" name="postId" value="<?= $postid ?>" />
                    <input name="writeComment" type="text" placeholder="Write you comment">

                    <input type="submit" name="commentButton" value="✓">
                    <div class="del"><input type="button" name="commentDeleteButton" value="x"></div>

                </div>

            </form>

        <?php endif; ?>

    </div>

</div>


    <?php } ?>

<div class="container">



</div>
