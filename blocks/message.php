<?php

$message = $_SESSION["message"] ?? "";

// Sets the style to the success message
if ($message) {
    print '<h4 style="color:#B0C4DE; font-weight:bold;">'.$message.'</h4>';
    unset($_SESSION["message"]);
}
