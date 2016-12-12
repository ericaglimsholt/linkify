<?php if ($error): ?>
    <div class="error">
        <?= $error; ?>
    </div>
    <?php
    unset($_SESSION["error"]);
endif;
?>
