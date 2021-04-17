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

$username = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- styles CSS -->
        <link href="css/style.css" rel="stylesheet">
        <title>Cypress Report Edit/Delete</title>
    </head>
<body>
    <section class="fullCard" id="thumbnail">
        <!-- Nav bar -->
        <nav id="navbar" class="navbar navbar-light navbar-expand-xl bg-clear">

            <a class="navbar-brand" href="index.html"><h2 class="titleLogo">Cypress</h2></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav" style="margin-left:auto; margin-right:5%">
                    <div class="navbar-item">
                        <a class="button btn btn-outline-info" href="main.php">
                            <b>Home</b>
                        </a>
                        <a class="button btn btn-outline-success" href="logout.php">
                            <b>Logout</b>
                        </a>
                    </div>
                </ul>
            </div>

        </nav>
        <div class="cardContent">
            <hr id="NavHeadingCenter">
            <div id="main">
                <p style="font-size:20px">My Reports</p>
                <?php
                        $sql = "SELECT * FROM reports WHERE user='$username' ORDER BY date";
                        $reports = mysqli_query($link, $sql) or die('Error');

                        if (mysqli_num_rows($reports) > 0) {
                            echo "<table>";
                            echo "<tr>";
                            echo "<td style=\"text-align:center; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">Date</t>";
                            echo "<td style=\"text-align:center; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">Address</t>";
                            echo "<td style=\"text-align:center; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">Issue</t>";
                            echo "<td style=\"text-align:center; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">Resolution</t>";
                            echo "<td style=\"text-align:center; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">Actions</t>";
                            echo "</tr>";
                            while ($fetch = mysqli_fetch_assoc($reports)) {
                                $id = $fetch["id"];
                                $r_date = $fetch["date"];
                                $address = $fetch["address"];
                                $problem = $fetch["problem"];
                                $solved = $fetch["solved"];
                                $resolved = "";
                                if ($solved == 0) {
                                    $resolved = "Unresolved";
                                } else {
                                    $resolved = "Resolved. Thank you for reporting!";
                                }
                                echo "<tr>";
                                echo "<td style=\"text-align:center; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">$r_date</t>";
                                echo "<td style=\"text-align:center; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">$address</t>";
                                echo "<td style=\"text-align:center; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">$problem</t>";
                                echo "<td style=\"text-align:center; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">$resolved</t>";
                                echo "<td style=\"text-align:center; width: auto; padding: 2px 10px; border: 2px solid rgb(11, 117, 255);\">";
                                echo "<form action=\"editReport.php\" method=\"get\">";
                                    echo "<input type=\"hidden\" name=\"id\" value=$id>";
                                    echo "<button type=submit style=\"margin: 2px 5px\" class=\"btn btn-primary\">Edit</button>";
                                echo "</form>";
                                echo "<form action=\"deleteReport.php\" method=\"GET\">";
                                    echo "<input type=\"hidden\" name=\"id\" value=$id>";
                                    echo "<button style=\"margin: 2px 5px\" class=\"btn btn-primary\">Delete</button></td>";
                                echo "</tr>";
                                echo "</form>";
                            }
                            echo "</table>";
                        } else {
                            echo "<p style=\"font-size:15px\">No reports to show</p>";
                        }
                ?>
            </div>
        </div>
        </div>
    </section>
</body>
</html>