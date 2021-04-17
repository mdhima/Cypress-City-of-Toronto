<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: mainfr.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$fname = $lname = $email = $phone = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Veuillez entrer votre nom d'utilisateur.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Veuillez entrer votre mot de passe.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, fname, lname, email, phone, username, password FROM userinfo WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $fname, $lname, $email, $phone, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $password;
                            $_SESSION["fname"] = $fname;
                            $_SESSION["lname"] = $lname;
                            $_SESSION["email"] = $email;
                            $_SESSION["phone"] = $phone;
                            
                            // Redirect user to welcome page
                            header("location: mainfr.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Le mot de passe que vous avez entré n'est pas valide.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Aucun compte trouvé avec ce nom d'utilisateur.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    
        <title>Cypress Connexion</title>
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
            <div class="loginScreen cardText center">
                <p> Vous êtes actuellement sur la page de connexion de Cypress. En vous connectant au système, vous serez en mesure de rapporter une variété de problèmes comme vous l'avez vu dans les rues de Toronto.
                </p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <div class="form-group mb-1">
                            <label>Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="username" placeholder="Entrez le nom d'utilisateur..." value="<?php echo $username; ?>">
                            <span><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group mt-1">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Entrez le mot de passe...">
                            <span><?php echo $password_err; ?></span>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary toLeft">Connexion</button>
                        <button class="btn btn-primary toLeft">
                            <a href="landingfr.html" style="color:white;text-decoration:none">Réinitialiser</a>
                        </button>
                        <label id="toLogin">Pas un utilisateur?
                            <a href="registerfr.php">S'inscrire!</a>
                        </label>
                    <div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>