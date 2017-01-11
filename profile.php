<?php
require __DIR__.'/autoload.php';
require __DIR__.'/blocks/login.php';
require __DIR__.'/blocks/head.php';

$information = dbGet($connection, "SELECT * FROM users");

foreach ($information as $info) {

}

?>


<html>

<body>

<?php

// The header
require __DIR__.'/blocks/header.php';

?>

<?php if (isset($_SESSION["login"]["uid"])): ?>

    <div class="container">
        <h1><?= $info["username"] ?>'s profile</h1>
        <div class="settingAvatar" value=""></div>
        <div class="information">
            <p>Name: <?= $info["name"] ?></p>
            <p>Email: <?= $info["email"] ?></p>
            <p>Bio: <?= $info["bio"] ?></p>
        </div>

    </div>


<?php endif; ?>

</body>

</html>
