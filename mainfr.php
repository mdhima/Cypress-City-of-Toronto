<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginfr.php");
    exit;
}

require_once "config.php";

$username = $_SESSION["username"];

$sql = "SELECT * from userinfo WHERE username='$username'";
$result = mysqli_query($link, $sql);
$res = mysqli_fetch_array($result);

$survey = $res["survey"];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- styles CSS -->
    <link href="css/style.css" rel="stylesheet" />
    <script>
        var showSurvey = <?php echo $survey ?>;
        if (showSurvey == -1) {
            var num = Math.floor((Math.random() * 10) + 1);
            if (num > 8) {
                var survey = confirm("Vous souhaitez participer à une enquête sur la ville?");
                if (survey == true) {
                    window.location.href = "surveyfr.php";
                }
            }
        }
    </script>
    <title>Cypress Zone des Membres</title>
</head>

<body>
    <section class="fullCard" id="thumbnail">
        <!-- Nav bar -->
        <nav id="navbar" class="navbar navbar-light navbar-expand-xl bg-clear">
            <a class="navbar-brand" href="index.html">
                <h2 class="titleLogo">Cypress</h2>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav" style="margin-left: auto; margin-right: 5%">
                    <div class="navbar-item">
                        <a class="button btn btn-outline-info" href="mainfr.php">
                            <b>Domicile</b>
                        </a>
                        <a class="button btn btn-outline-success" href="logout.php">
                            <b>Se déconnecter</b>
                        </a>
                    </div>
                </ul>
            </div>
        </nav>
        <div class="cardContent">
            <hr id="NavHeadingCenter" />

            <div class="mainScreen cardText">
                <p>Bienvenue <?php echo htmlspecialchars(ucfirst($_SESSION["fname"])); ?>!</p>
                <br />

    
                <div class="firstLinks">
                        <a href="profilefr.php" class="btn btn-primary toLeft mainButton">Vos Informations</a>

                        <a href="reportcreatefr.php" class="btn btn-primary toLeft mainButton">Créer un Rapport</a>

                        <a href="reporteditfr.php" class="btn btn-primary toLeft mainButton">Modifier / Supprimer le Rapport</a>

                        <a href="suggestfr.php" class="btn btn-primary toLeft mainButton">Envoyer une Suggestion</a>
                </div>
                <div class="secondLinks">
                        <a href="votefr.php" class="btn btn-primary toLeft mainButton">Voter</a>

                        <a href="friendfr.html" class="btn btn-primary toLeft mainButton">Partager avec un Ami</a>

                        <a href="faqfr.php" class="btn btn-primary toLeft mainButton">FAQ</a>

                        <a href="contactfr.php" class="btn btn-primary toLeft mainButton">Nous Contacter</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>