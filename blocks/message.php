<?php

$message = $_SESSION["message"] ?? "";

if ($message) {
    print '<h4 style="color:#B0C4DE; font-weight:bold;">'.$message.'</h4>';
    unset($_SESSION["message"]);
}
