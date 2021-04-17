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

// Define variables and initialize with empty values
$fname = $lname = $email = $phone = "";
$fname_err = $lname_err = $email_err = $phone_err = "";
$username = $_SESSION["username"];
$password = $confirm_password = "";
$password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate first name
    if(empty(trim($_POST["fname"]))){
        $fname_err = "Veuillez entrer votre prénom.";     
    } else{
        $fname = trim($_POST["fname"]);
    }
    // Validate last name
    if(empty(trim($_POST["lname"]))){
        $lname_err = "Veuillez entrer votre nom de famille.";     
    } else{
        $lname = trim($_POST["lname"]);
    }
    
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Veuillez entrer votre adresse e-mail.";     
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Validate phone
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Veuillez entrer votre numéro de téléphone.";     
    } else{
        $phone = trim($_POST["phone"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Veuillez entrer un mot de passe.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Le mot de passe doit comporter au moins 6 caractères.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Veuillez confirmer un mot de passe.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Le mot de passe ne correspond pas.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($fname_err) && empty($lname_err) && empty($email_err) && empty($phone_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "UPDATE userinfo SET fname = ?, lname = ?, email = ?, phone = ?, password = ? WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_fname, $param_lname, $param_email, $param_phone, $param_password, $param_user);
            
            // Set parameters
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            $param_phone = $phone;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_user = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $_SESSION["password"] = $password;
                $_SESSION["fname"] = $fname;
                $_SESSION["lname"] = $lname;
                $_SESSION["email"] = $email;
                $_SESSION["phone"] = $phone;
                // Redirect to login page
                header("location: profilefr.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
<html lang="en">

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

    <title>Cypress Informations sur le Profil</title>
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
            <div>
                <h4>Informations sur le profil</h4>
                <p>Remarque: votre nom d'utilisateur ne peut pas être modifié.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <div>
                            <label>Prénom:</label>
                            <input type="text" name="fname" placeholder="Entrez votre prénom..." value="<?php echo $fname; ?>">
                            <br>
                            <span style="font-size:10px"><?php echo $fname_err; ?></span>
                            <br>
                        </div>
                        <div>
                            <label>Nom de famille:</label>
                            <input type="text" name="lname" placeholder="Entrez nom de famille..." value="<?php echo $lname; ?>">
                            <br>
                            <span style="font-size:10px"><?php echo $lname_err; ?></span>
                            <br>
                        </div>
                        <div>
                            <label>Adresse e-mail:</label>
                            <input type="email" name="email" placeholder="Entrez votre adresse e-mail..." value="<?php echo $email; ?>">
                            <br>
                            <span style="font-size:10px"><?php echo $email_err; ?></span>
                            <br>
                        </div>
                        <div">
                            <label>Numéro de téléphone (numéros uniquement):</label>
                            <input type="tel" name="phone" placeholder="4161234567" pattern="[0-9]{10}" value="<?php echo $phone; ?>">
                            <br>
                            <span style="font-size:10px"><?php echo $phone_err; ?></span>
                            <br>
                        </div>
                        <div>
                            <label>Mot de passe:</label>
                            <input type="password" name="password" placeholder="Entrez votre mot de passe..." value="<?php echo $password; ?>">
                            <br>
                            <span style="font-size:10px"><?php echo $password_err; ?></span>
                            <br>
                        </div>
                        <div>
                            <label>Confirmez le mot de passe:</label>
                            <input type="password" name="confirm_password" placeholder="Confirmez le mot de passe..." value="<?php echo $confirm_password; ?>">
                            <br>
                            <span style="font-size:10px"><?php echo $confirm_password_err; ?></span>
                            <br>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary toLeft">Save</button>
                        <button class="btn btn-primary toLeft">
                            <a href="profilefr.php" style="color:white;text-decoration:none">Cancel</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>