<?php
    require __DIR__.'/autoload.php';
    require __DIR__.'/blocks/login.php';
    require __DIR__.'/blocks/head.php';
    require __DIR__.'/lib/newpost.php';
?>

<html>

    <body>

    <?php
        require __DIR__.'/blocks/header.php';
    ?>

    <?php if(isset($_SESSION["login"]["uid"])):  ?>

    <div class="container">

        <?php

        require __DIR__.'/blocks/message.php';
        require __DIR__.'/blocks/error.php';

        ?>

        <h1>Share a new link</h1>

        <form name="registerPost" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="action" value="createPost">

            <div class="inputRegister">
                <p>Subject:</p>
                <input type="text" name="newSubject" value="">
            </div>

            <div class="inputRegister">
                <p>Link:</p>
                <input type="url" name="newLink" value="">
            </div>

            <input type="submit" name="linkButton" value="Share link">
        </form>

    </div>

    <?php endif; ?>

    </body>

</html>
