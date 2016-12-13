<?php
// Start the engine.
session_start();

// Set the default timezone.
date_default_timezone_set('UTC');

// Set the encoding to UTF-8.
mb_internal_encoding('UTF-8');

// Include the database setup.
require __DIR__.'/lib/database.php';

// Include the helper functions.
require __DIR__.'/lib/functions.php';
