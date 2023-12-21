<?php
session_start();

// Reset all variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to home page
header("Location: index.php");
exit;
