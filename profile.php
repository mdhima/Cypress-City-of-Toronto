<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
    <script>
        function deleteAcc() {
            var del = confirm("Are you sure you want to delete your account?");
            if (del === true) {
                prompt("What is your reason for leaving?");
                window.location.href = "/deleteacc.php";
            }
        }
    </script>
    <title>Cypress Profile Info</title>
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
            <hr id="NavHeadingCenter" />
            <div id="outline">
              <div class="profileScreen cardText">
                  <h4>Profile Info</h4>
                  <img style="width:10em; height:10em;" src="https://web.maariba.com/assets/images/service_user.png" alt="user">
                  <p>Note: Your username cannot be changed.</p>
                  <p>First Name: <?php echo htmlspecialchars($_SESSION["fname"]); ?></p>
                  <p>Last Name: <?php echo htmlspecialchars($_SESSION["lname"]); ?></p>
                  <p>Username: <?php echo htmlspecialchars($_SESSION["username"]); ?></p>
                  <p>Password: <?php echo htmlspecialchars($_SESSION["password"]); ?></p>
                  <p>Email: <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
                  <p>Phone: <?php echo htmlspecialchars($_SESSION["phone"]); ?></p>
                  <br>
                  <button type="button" class="btn btn-primary ">
                      <a href="profileedit.php" style="color:white;text-decoration:none">Edit</a>
                  </button>
                  <button type="button" class="btn btn-primary " onclick="deleteAcc()">
                      Delete Account
                  </button>  
            </div>
          </div>
    </section>
</body>

</html>
