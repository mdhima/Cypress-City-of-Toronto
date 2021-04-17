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
$result = "";
$username = $_SESSION["username"];

$sql1 = "SELECT survey FROM userinfo WHERE username = '$username' AND survey=-1";
$res = mysqli_query($link, $sql1);

if (mysqli_num_rows($res) > 0) {
    $proceed = true;
} else {
    $proceed = false;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if ($proceed == true) {
        $sql = "INSERT INTO survey(user, q1, q2, q3, q4, q5) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_user, $param_q1, $param_q2, $param_q3, $param_q4, $param_q5);
                
            // Set parameters
            $param_user = $username;
            $param_q1 = trim($_POST["q1"]);
            $param_q2 = trim($_POST["q2"]);
            $param_q3 = trim($_POST["q3"]);
            $param_q4 = trim($_POST["q4"]);
            $param_q5 = trim($_POST["q5"]);
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                $sql2 = "UPDATE userinfo SET survey = 1 WHERE username = '$username'";

                if (mysqli_query($link, $sql2)) {
                    header("location: mainfr.php");
                } else {
                    echo "Something went wrong!";
                }
                
            } else {
                echo "Something went wrong!";
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
            
        }
    } else {
        $result = "Vous avez déjà répondu à cette enquête. Merci!";
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
    
        <title>Cypress Enquête sur la ville</title>
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
                        <a class="button btn btn-outline-success" href="logoutfr.php">
                            <b>Se déconnecte</b>
                        </a>
                    </div>
                </ul>
            </div>

        </nav>
        <div class="cardContent">
            <hr id="NavHeadingCenter">
            <div class="reportCreate cardText">
                <h4>Enquête sur la ville</h4>
                <span style="color: red; font-size: 20px"><?php echo $result ?></span>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="reportCreateScreen">
                        <div>
                            <label id="title">Dans quel quartier de Toronto habitez-vous?:</label>
                            <select name="q1" required>
                                <option value="Etobicoke North">Etobicoke North</option>
                                <option value="Etobicoke Centre">Etobicoke Centre</option>
                                <option value="Etobicoke-Lakeshore">Etobicoke-Lakeshore</option>
                                <option value="Parkdale-High Park">Parkdale-High Park</option>
                                <option value="York South-Weston">York South-Weston</option>
                                <option value="York Centre">York Centre</option>
                                <option value="Humber River-Black Creek">Humber River-Black Creek</option>
                                <option value="Eglinton-Lawrence">Eglinton-Lawrence</option>
                                <option value="Davenport">Davenport</option>
                                <option value="Spadina-Fort York">Spadina-Fort York</option>
                                <option value="University-Rosedale">University-Rosedale</option>
                                <option value="Toronto-St. Paul’s">Toronto-St. Paul’s</option>
                                <option value="Toronto Centre">Toronto Centre</option>
                                <option value="Toronto-Danforth">Toronto-Danforth</option>
                                <option value="Don Valley West">Don Valley West</option>
                                <option value="Don Valley East">Don Valley East</option>
                                <option value="Don Valley North">Don Valley North</option>
                                <option value="Willowdale">Willowdale</option>
                                <option value="Beaches-East York">Beaches-East York</option>
                                <option value="Scarborough Southwest">Scarborough Southwest</option>
                                <option value="Scarborough Centre">Scarborough Centre</option>
                                <option value="Scarborough-Agincourt">Scarborough-Agincourt</option>
                                <option value="Scarborough North">Scarborough North</option>
                                <option value="Scarborough-Guildwood">Scarborough-Guildwood</option>
                                <option value="Scarborough-Rouge Park">Scarborough-Rouge Park</option>
                            </select>
                        </div>
                        <div>
                            <label id="title">À quelle fréquence voyez-vous des incidents / problèmes dans votre communauté?:</label>
                            <select name="q2" required>
                                <option value="Always">Toujours</option>
                                <option value="Frequently">Souvent</option>
                                <option value="Sometimes">Parfois</option>
                                <option value="Rarely">Rarement</option>
                                <option value="Never">Jamais</option>
                            </select>
                        </div>
                        <div class="radioButtons">
                            <label id="title">Avez-vous déjà utilisé Cypress pour signaler un problème dans la communauté?:</label>
                            <div class="col1">
                                <label><input type="radio" name="q3" value="Yes" required>Oui</label>
                                <label><input type="radio" name="q3" value="No">Non</label>
                            </div>
                            <br>
                        </div>
                        <div class="radioButtons">
                            <label id="title">Si vous avez utilisé Cypress pour signaler un problème, quelle est la probabilité que vous le recommandiez à un ami?:</label>
                            <div class="col1">
                                <label><input type="radio" name="q4" value="Very Likely" required>Très probable</label>
                                <label><input type="radio" name="q4" value="Likely">Probable</label>
                                <label><input type="radio" name="q4" value="Not At All Likely">Pas du tout probable</label>
                                <label><input type="radio" name="q4" value="N/A">N'est pas applicable</label>
                            </div>
                            <br>
                        </div>
                        <div class="radioButtons">
                            <label id="title">Sur une échelle de 1 à 5, 5 étant le meilleur et 1 le pire, comment évalueriez-vous la réponse de la ville de Toronto aux problèmes de la communauté?:</label>
                            <div class="col1">
                                <label><input type="radio" name="q5" value="1" required>1</label>
                                <label><input type="radio" name="q5" value="2">2</label>
                                <label><input type="radio" name="q5" value="3">3</label>
                                <label><input type="radio" name="q5" value="4">4</label>
                                <label><input type="radio" name="q5" value="5">5</label>
                            </div>
                            <br>
                        </div>
                        <div class="buttons">
                            <p></p>
                            <button type="submit" class="btn btn-primary toLeft">Soumettre</button>
                            <button type="reset" class="btn btn-primary toLeft">Réinitialiser</button> 
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>