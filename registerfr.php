<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$fname = $lname = $email = $phone = "";
$fname_err = $lname_err = $email_err = $phone_err = "";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

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

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Veuillez entrer un nom d'utilisateur.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM userinfo WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ce nom d'utilisateur est pris.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
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
        $confirm_password_err = "Veuillez confirmer le mot de passe.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Le mot de passe ne correspond pas.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($fname_err) && empty($lname_err) && empty($email_err) && empty($phone_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO userinfo (fname, lname, email, phone, username, password) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_fname, $param_lname, $param_email, $param_phone, $param_username, $param_password);
            
            // Set parameters
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            $param_phone = $phone;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                header("location: loginfr.php");
                
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
    
        <title>Enregistrement de Cypress</title>
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
                        <a class="button btn btn-outline-info" href="loginfr.php">
                            <b>Se connecter</b>
                        </a>
                        <a class="button btn btn-outline-success" href="registerfr.php">
                            <b>S’inscrire</b>
                        </a>
                    </div>
                </ul>
            </div>

        </nav>
        <div class="cardContent">
            <hr id="NavHeadingCenter">
            <div class="registrationScreen cardText" style="height: 770px;">
                <p id="titleFomat4">Entrez les informations ci-dessous</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <div>
                            <label>Prénom:</label>
                            <input type="text" name="fname" placeholder="Entrez votre prenom..." value="<?php echo $fname; ?>">
                            <br>
                            <span style="font-size:10px"><?php echo $fname_err; ?></span>
                            <br>
                        </div>
                        <div>
                            <label>Nom de famille:</label>
                            <input type="text" name="lname" placeholder="Entrez votre nom de famille..." value="<?php echo $lname; ?>">
                            <br>
                            <span style="font-size:10px"><?php echo $lname_err; ?></span>
                            <br>
                        </div>
                        <div>
                            <label>Adresse e-mail:</label>
                            <input type="email" name="email" placeholder="Entrez votre adresse email..." value="<?php echo $email; ?>">
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
                            <label>Nom d'utilisateur:</label>
                            <input type="text" name="username" placeholder="Entrez le nom d'utilisateur..." value="<?php echo $username; ?>">
                            <br>
                            <span style="font-size:10px"><?php echo $username_err; ?></span>
                            <br>
                        </div>    
                        <div>
                            <label>Mot de passe:</label>
                            <input type="password" name="password" placeholder="Entrez le mot de passe..." value="<?php echo $password; ?>">
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
                        <label>En cliquant sur S'inscrire, vous acceptez le
                            <a href="termsfr.html">termes et conditions</a> de ce site Web.
                        </label>
                        <br>
                        <button type="submit" class="btn btn-primary toLeft">S'inscrire</button>
                        <button class="btn btn-primary toLeft">
                            <a href="landingfr.html" style="color:white;text-decoration:none">Réinitialiser</a>
                        </button> 
                        <label>Déjà utilisateur?
                            <a href="loginfr.php">Connexion!</a>
                        </label>
                        <br>
                        <button class="btn btn-primary toLeft">
                            <a href="faqfr.php" style="color:white;text-decoration:none">FAQ</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>