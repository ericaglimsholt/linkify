<div class="container">

    <?php

    require __DIR__.'/message.php';
    require __DIR__.'/error.php';

    ?>

    <h1>Share a new link</h1>

    <form name="registerPost" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="action" value="createPost">

        <div class="inputRegister">
            <p>Subject:</p>
            <input type="text" name="newSubject" value="">
        </div>

        <div class="inputRegister">
            <p>Description:</p>
            <input type="text" name="newDescription" value="">
        </div>

        <div class="inputRegister">
            <p>Link:</p>
            <input type="url" name="newLink" value="">
        </div>

        <input type="submit" name="linkButton" value="Share link">
    </form>

</div>