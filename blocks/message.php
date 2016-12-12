<?php if ($message): ?>
    <div class="message">
        <?= $message; ?>
    </div>
    <?php
    unset($_SESSION["message"]);
endif;
?>
