<?php
// Initialize the session
session_start();

// Get the username
$username = $_SESSION["username"];

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

require_once "config.php";

$dacc = "DELETE FROM userinfo WHERE username='$username'";

mysqli_query($link, $dacc);

// also deletes the user's reports
$dreports = "DELETE FROM reports WHERE user='$username'";

mysqli_query($link, $dreports);

// Redirect to login page after done
header("location: index.html");
exit;
?>
