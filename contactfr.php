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
        <script src="loginPage.js"></script>
        <!--Font Awesome-->
        <script src="https://kit.fontawesome.com/51868c8016.js" crossorigin="anonymous"></script>
        <!-- jQuery and Bootstrap bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
        <title>Cypress Nous Contacter</title>
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

        <div class="cardContent">
            <hr id="NavHeadingCenter">
            <h2 style="text-align: center; font-weight: 600;" class="mb-3">Agents de la sécurité routière de la ville de Toronto</h2>
            <div class="card-deck">
                
                <div class="card mb-2 border-primary">
                    <img class="card-img-top" style="border-radius: 3px;" src="https://www.toronto.ca/wp-content/uploads/2018/12/8ca6-Colle-350x437.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Mike Colle</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">416-123-2345</li>
                        <li class="list-group-item">mikeycolley@cypress.ca</li>
                    </ul>
                    <div class="card-body">
                        <a href='https://www.facebook.com/collemike88'><i class="fab fa-facebook-square"></i></a>
                        <a href='https://www.instagram.com/mike.colle/'><i class="fab fa-instagram-square"></i></a>
                    </div>
                </div>
            
                <div class="card mb-2 border-primary">
                    <img class="card-img-top" style="border-radius: 3px;" src="https://www.toronto.ca/wp-content/uploads/2018/11/8f63-McKelvie-350x437.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Jennifer McKelvie</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">416-321-2222</li>
                        <li class="list-group-item">mc.jen@cypress.ca</li>
                    </ul>
                    <div class="card-body">
                        <a href='https://www.facebook.com/McKelvieWard25'><i class="fab fa-facebook-square"></i></a>
                        <a href='https://twitter.com/McKelvieWard25'><i class="fab fa-twitter-square"></i></a>
                        <a href='https://www.youtube.com/channel/UCMwwcoYlqhTxTMa5WTldCnw'><i class="fab fa-youtube-square"></i></a>
                    </div>
                </div>
            
                <div class="card mb-2 border-primary">
                    <img class="card-img-top" style="border-radius: 3px;" src="https://www.toronto.ca/wp-content/uploads/2018/12/93bc-Ainslie-350x437.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Paul Ainslie</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">416-121-1212</li>
                        <li class="list-group-item">pains.lie@cypress.ca</li>
                    </ul>
                    <div class="card-body">
                        <a href='https://www.facebook.com/councillorpaulainslieScarboroughGuildwood/'><i class="fab fa-facebook-square"></i></a>
                        <a href='https://twitter.com/cllrainslie'><i class="fab fa-twitter-square"></i></a>
                        <a href='https://www.youtube.com/channel/UCdbqAJNSBe_3XKlL_R8JQ9Q'><i class="fab fa-youtube-square"></i></a>
                    </div>
                </div>

            </div>
            <div class="card-deck">
                
                <div class="card mb-2 border-primary">
                    <img class="card-img-top" style="border-radius: 3px;" src="https://www.toronto.ca/wp-content/uploads/2018/12/94fd-Baila%CC%83o-350x437.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Ana Bailão</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">416-123-1234</li>
                        <li class="list-group-item">ana.bail@cypress.ca</li>
                    </ul>
                    <div class="card-body">
                        <a href='https://www.facebook.com/anabailaoTO/'><i class="fab fa-facebook-square"></i></a>
                        <a href='https://twitter.com/anabailaoto'><i class="fab fa-twitter-square"></i></a>
                        <a href='https://www.linkedin.com/in/ana-bail%C3%A3o-3a55706/'><i class="fab fa-linkedin"></i></a>
                        
                    </div>
                </div>
            
                <div class="card mb-2 border-primary">
                    <img class="card-img-top" style="border-radius: 3px;" src="https://www.toronto.ca/wp-content/uploads/2018/12/85d4-Bradford-350x438.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Brad Bradford</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">416-123-4567</li>
                        <li class="list-group-item">bradbrad@cypress.ca</li>
                    </ul>
                    <div class="card-body">
                        <a href='https://www.facebook.com/BradMBradford'><i class="fab fa-facebook-square"></i></a>
                        <a href='https://twitter.com/BradMBradford'><i class="fab fa-twitter-square"></i></a>
                    </div>
                </div>
            
                <div class="card mb-2 border-primary">
                    <img class="card-img-top" style="border-radius: 3px;" src="https://www.toronto.ca/wp-content/uploads/2018/12/9378-Pasternak-350x437.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">James Pasternak</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">416-123-8888</li>
                        <li class="list-group-item">james.past@cypress.ca</li>
                    </ul>
                    <div class="card-body">
                        <a href='https://www.facebook.com/PasternakTO/'><i class="fab fa-facebook-square"></i></a>
                        <a href='https://twitter.com/pasternakto?lang=en'><i class="fab fa-twitter-square"></i></a>

                    </div>
                </div>

            </div>
            <div>
                
            </div>
        </div>
    </section>
</body>
</html>