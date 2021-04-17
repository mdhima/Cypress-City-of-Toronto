<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginfr.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize
$address = $problem = "";
$address_err = $problem_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate address
    if(empty(trim($_POST["address"]))){
        $address_err = "Veuillez entrez l'adresse.";     
    } else{
        $address = trim($_POST["address"]);
    }
    // Validate problem
    if(empty(trim($_POST["problem"]))){
        $problem_err = "Veuillez sélectionner un problème.";     
    } else{
        $problem = trim($_POST["problem"]);
    }

// Check input errors before inserting in database
    if(empty($address_err) && empty($problem_err)){
        
        // Prepare an insert statement
        $sql = "UPDATE reports SET address = ?, problem = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_address, $param_problem, $param_id);
            
            // Set parameters
            $param_address = $address;
            $param_problem = $problem;
            $param_id = $_POST["rid"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                header("location: reporteditfr.php");
            } else {
                echo "Something went wrong!";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html lang="fr">
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
        <title>Cypress Rapport Modifier / Supprimer</title>
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
            <hr id="NavHeadingCenter">
            <div class="reportCreate cardText">
                <h5 id="titleFomat4">Modifier le rapport</h5>
                <br>
                <span style="font-size: 12px"><?php echo $result ?></span>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="reportCreateScreen">
                        <div>
                            <label id="addressTitle">Adresse:</label>
                            <input id="addressTextBox" type="text" name="address" placeholder="Enter address..." value="<?php echo $address; ?>">
                            <br>
                            <div>
                                <span style="color: red; font-size:15px"><?php echo $address_err; ?></span>
                            </div>
                            <br>
                        </div>
                        <label id="problemsTitle">Les problèmes:</label>
                        <div class="row">
                            <div class="col-sm">
                                <label><input type="radio" name="problem" value="Utility Failures">Les échecs utilitaire</label><BR>
                                <label><input type="radio" name="problem" value="Potholes">Nids-de-poule</label><BR>
                                <label><input type="radio" name="problem" value="City Property Vandalism">Vandalisme de propriété de la ville</label><BR>
                                <label><input type="radio" name="problem" value="Eroded Streets">Rues érodées</label>
                            </div>
                            <div class="col-sm">
                              <label><input type="radio" name="problem" value="Tree Collapse">Effondrement de l'arborescence</label><BR>
                              <label><input type="radio" name="problem" value="Flooded Streets">Rues inondées</label><BR>
                              <label><input type="radio" name="problem" value="Mould and Spare Growth">Croissance des moisissures et des spores</label><BR>
                              <label><input type="radio" name="problem" value="Garbage/Other Road Blocking Objects">Déchets ou d'autre objets qui bloquent la route</label>
                            </div>
                        </div>
                        <br>
                        <div>
                            <span style="color: red; font-size:15px"><?php echo $problem_err; ?></span>
                        </div>
                        <br>
                        <div class="buttons">
                          <p></p>
                          <input type="hidden" name="rid" value="<?php echo $_GET["id"] ?>">
                          <button type="submit" class="btn btn-primary toLeft">Rapporter</button>
                        <br>
                        </div>
                    </div>
                </form>
                <div class="buttons">
                    <form action="reporteditfr.php" method="POST">
                        <button id="aButtonToo" type="submit" class="btn btn-primary toLeft">Annuler</button> 
                    </form>
                </div>
            </div>
          <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d16329.076142344104!2d-79.39307146185848!3d43.65648743543163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sca!4v1617763479068!5m2!1sen!2sca" width=100% height="600" style="border:1;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        </div>
    </section>
</body>
</html>