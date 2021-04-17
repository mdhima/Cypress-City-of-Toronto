<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $button1 = "Log in";
    $button2 = "Register";
    $b1url = "login.php";
    $b2url = "register.php";
} else {
    $button1 = "Home";
    $button2 = "Logout";
    $b1url = "main.php";
    $b2url = "logout.php";
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
        <!-- jQuery and Bootstrap bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
        <title>Cypress FAQ</title>
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
                        <a class="button btn btn-outline-info" href="<?php echo $b1url ?>">
                            <b><?php echo $button1 ?></b>
                        </a>
                        <a class="button btn btn-outline-success" href="<?php echo $b2url ?>">
                            <b><?php echo $button2 ?></b>
                        </a>
                    </div>
                </ul>
            </div>

        </nav>
        <div class="cardContent" style="margin-top: 0; border-top: 0; padding-top: 0;">
            <hr id="NavHeadingCenter">
            <h3 style="margin-bottom: 1%;">Frequently Asked Questions (FAQ)</h3>
            <div>
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; How do I report a problem?
                    </a>
                    <div class="collapse" id="collapse1">
                        <div class="card card-body">
                            Visit the Report page.
                        </div>
                    </div>
                </p>
    
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; How can I contact the City of Toronto?
                    </a>
                    <div class="collapse" id="collapse2">
                        <div class="card card-body">
                            <UL>
                                <li>Call <I>311</I></li>
                                <li><a href="https://www.toronto.ca/home/311-toronto-at-your-service/">Visit our 311 page</a></li>
                                <li><a href="https://twitter.com/311Toronto">Tweet at us at 311</a></li>
                                <li>Contact a CYTRSO <a href="contact.html">here!</a></li>
                            </UL>
                        </div>
                    </div>
                </p>
    
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; I have a suggestion for Cypress, who should I contact?
                    </a>
                    <div class="collapse" id="collapse3">
                        <div class="card card-body">
                            <div>Send us an email at <a href="mailto:cypress@support.ca">cypress@support.ca</a></div>
                        </div>
                    </div>
                </p>
    
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; I have a problem but it's not one of the listed options.
                    </a>
                    <div class="collapse" id="collapse4">
                        <div class="card card-body">
                            <div>Please directly contact us by calling <I>311</I> or contact a CYTRSO on the <a href="contact.html">Contact Us</a> page.</div>
                        </div>
                    </div>
                </p>
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse5" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; Can reports be deleted?
                    </a>
                    <div class="collapse" id="collapse5">
                        <div class="card card-body">
                            Yes, visit the Edit/Delete Report page and press the delete button to remove an outstanding report from the database.
                        </div>
                    </div>
                </p>
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse6" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; What is Cypress?
                    </a>
                    <div class="collapse" id="collapse6">
                        <div class="card card-body">
                            Cypress is an automated all-encompassing system that provides citizens the ability to report problems they notice on the streets of Toronto and track the resolution of those problems.
                        </div>
                    </div>
                </p>

            </div> 
        </div>
    </section>
</body>
</html>