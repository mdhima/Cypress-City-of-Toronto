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
                    header("location: main.php");
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
        $result = "You have already taken this survey. Thank you!";
    }

    // Close connection
    mysqli_close($link);
}
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
    
        <title>Cypress City Survey</title>
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
            <div class="reportCreate cardText">
                <h4>City Survey</h4>
                <span style="color: red; font-size: 20px"><?php echo $result ?></span>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="reportCreateScreen">
                        <div>
                            <label id="title">What Toronto ward do you live in?:</label>
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
                            <label id="title">How often do you see incidents/issues in your community?:</label>
                            <select name="q2" required>
                                <option value="Always">Always</option>
                                <option value="Frequently">Frequently</option>
                                <option value="Sometimes">Sometimes</option>
                                <option value="Rarely">Rarely</option>
                                <option value="Never">Never</option>
                            </select>
                        </div>
                        <div class="radioButtons">
                            <label id="title">Have you ever used Cypress to report an issue in the community?:</label>
                            <div class="col1">
                                <label><input type="radio" name="q3" value="Yes" required>Yes</label>
                                <label><input type="radio" name="q3" value="No">No</label>
                            </div>
                            <br>
                        </div>
                        <div class="radioButtons">
                            <label id="title">If you've used Cypress to report an issue, how likely are you to recommend it to a friend?:</label>
                            <div class="col1">
                                <label><input type="radio" name="q4" value="Very Likely" required>Very Likely</label>
                                <label><input type="radio" name="q4" value="Likely">Likely</label>
                                <label><input type="radio" name="q4" value="Not At All Likely">Not At All Likely</label>
                                <label><input type="radio" name="q4" value="N/A">N/A</label>
                            </div>
                            <br>
                        </div>
                        <div class="radioButtons">
                            <label id="title">On a scale of 1-5, with 5 being the best and 1 being the worst, how would you rate the City of Toronto's response to issues in the community?:</label>
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
                            <button type="submit" class="btn btn-primary toLeft">Submit</button>
                            <button type="reset" class="btn btn-primary toLeft">Reset</button> 
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>