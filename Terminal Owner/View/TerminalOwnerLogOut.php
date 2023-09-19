<?php
// // Start the session
session_start();

$_SESSION = array();

// // Destroy the session
session_destroy();

// // Redirect to the login page or any other page of your choice
header("Location:../../Transport Owner/View/Login.html");
exit;

?>
