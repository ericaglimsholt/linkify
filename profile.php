<?php
require __DIR__.'/autoload.php';
require __DIR__.'/blocks/login.php';
require __DIR__.'/blocks/head.php';

$uid = $_SESSION["login"]["uid"];

$information = dbGet($connection, "SELECT * FROM users, posts WHERE posts.uid = '$uid'");

foreach ($information as $info) {

}


?>


<html>

<body>

<?php

// The header
require __DIR__.'/blocks/header.php';

?>

<!-- Check if user are logged in -->
<?php if (isset($_SESSION["login"]["uid"])): ?>

    <div class="container">

        <!-- Shows users information -->
        <h1><?= $info["username"] ?>'s profile</h1>
        <div class="settingAvatar" value="">
            <?php if ($info["avatar"] !== NULL) {  ?>
                <img class="settingAvatar" src="img/users/<?=$info["uid"]?>/<?=$info["avatar"]?>" />
            <?php } else { ?>
                <img   class="settingAvatar"src="/img/avatar.png" />
            <?php } ?>
        </div>
        <div class="information">
            <p>Name: <?= $info["name"] ?></p>
            <p>Email: <?= $info["email"] ?></p>
            <p>Bio: <?= $info["bio"] ?></p>
        </div>
        <h1><?= $info["username"] ?>'s links</h1>

        <?php
            require("blocks/new2.php");
        ?>

    </div>

<?php endif; ?>

</body>

</html>
