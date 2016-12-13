<?php

$error = $_SESSION["error"] ?? "";

if ($error) {
    print '<h4 style="color:red; font-weight:bold;">'.$error.'</h4>';
    unset($_SESSION["error"]);
}