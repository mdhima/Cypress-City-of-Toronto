<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $button1 = "Se connecter";
    $button2 = "S’inscrire";
    $b1url = "loginfr.php";
    $b2url = "registerfr.php";
} else {
    $button1 = "Domicile";
    $button2 = "Se déconnecter";
    $b1url = "mainfr.php";
    $b2url = "logout.php";
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
            <h3 style="margin-bottom: 1%;">Foire aux questions (FAQ)</h3>
            <div>
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; Comment puis-je rapporter un problème? 
                    </a>
                    <div class="collapse" id="collapse1">
                        <div class="card card-body">
                            Visiter la page de rapport.
                        </div>
                    </div>
                </p>
    
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; Comment puis-je contacter la ville de Toronto? 
                    </a>
                    <div class="collapse" id="collapse2">
                        <div class="card card-body">
                            <UL>
                                <li>Appeller <I>311</I></li>
                                <li><a href="https://www.toronto.ca/home/311-toronto-at-your-service/">Visit our 311 page</a></li>
                                <li><a href="https://twitter.com/311Toronto">Tweet at us at 311</a></li>
                                <li>Contactez un CYTRSO <a href="contactfr.html">ici!</a></li>
                            </UL>
                        </div>
                    </div>
                </p>
    
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; J'ai une suggestion pour Cypress, qui dois-je contacter? 
                    </a>
                    <div class="collapse" id="collapse3">
                        <div class="card card-body">
                            <div>Envoyez-nous un e-mail à <a href="mailto:cypress@support.ca">cypress@support.ca</a></div>
                        </div>
                    </div>
                </p>
    
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; J'ai un problème mais ce n'est pas l'une des options listées. 
                    </a>
                    <div class="collapse" id="collapse4">
                        <div class="card card-body">
                            <div>Contacter directement en appelant <I>311</I> ou contacter un CYTRSO sur la page <a href="contactfr.html">Contactez-nous</a>.</div>
                        </div>
                    </div>
                </p>
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse5" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; Les rapports peuvent-ils être supprimés?
                    </a>
                    <div class="collapse" id="collapse5">
                        <div class="card card-body">           
                            Oui, visitez la page Modifier / Supprimer le rapport et appuyez sur le bouton Supprimer pour supprimer un rapport en suspens de la base de données.
                        </div>
                    </div>
                </p>
                <p>
                    <a class="btn btn-dark btn-block" data-toggle="collapse" href="#collapse6" role="button" aria-expanded="true" aria-controls="collapseTab">
                        &#129171; Qu'est-ce que le Cypress?
                    </a>
                    <div class="collapse" id="collapse6">
                        <div class="card card-body">
                            Cypress est un système automatisé complet qui permet aux citoyens de signaler les problèmes qu'ils remarquent dans les rues de Toronto et de suivre leur résolution.
                        </div>
                    </div>
                </p>


            </div> 
        </div>
    </section>
</body>
</html>