<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize
$id = "";

if($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];
    
        $sql = "DELETE FROM reports WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_id);
                
            $param_id = $id;
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                header("location: reportedit.php");
            } else {
                echo "Something went wrong!";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }

    // Close connection
    mysqli_close($link);
}

?>