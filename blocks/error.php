<?php

$error = $_SESSION["error"] ?? "";

// Sets the style to the error message
if ($error) {
    print '<h4 style="color:red; font-weight:bold;">'.$error.'</h4>';
    unset($_SESSION["error"]);
}