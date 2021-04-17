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

$sql = "SELECT * FROM votes";
$result = mysqli_query($link, $sql);
$votes = mysqli_fetch_array($result);

$v11 = $votes["v11"];
$v12 = $votes["v12"];
$v13 = $votes["v13"];
$v21 = $votes["v21"];
$v22 = $votes["v22"];
$v23 = $votes["v23"];
$v31 = $votes["v31"];
$v32 = $votes["v32"];
$v33 = $votes["v33"];
$id = $votes["id"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(!empty(trim($_POST["v11"]))){
        $v11 += 1;
        $sql1 = "UPDATE votes SET v11 = '$v11' WHERE id='$id'";
        if (!mysqli_query($link, $sql1)) {
          echo "Something went wrong.";
          header("location: index.html");
        }    
    }

    if(!empty(trim($_POST["v12"]))){
        $v12 += 1;
        $sql1 = "UPDATE votes SET v12 = '$v12' WHERE id='$id'";
        if (!mysqli_query($link, $sql1)) {
          echo "Something went wrong.";
        }    
    }

    if(!empty(trim($_POST["v13"]))){
        $v13 += 1;
        $sql1 = "UPDATE votes SET v13 = '$v13' WHERE id='$id'";
        if (!mysqli_query($link, $sql1)) {
          echo "Something went wrong.";
        }    
    }

    if(!empty(trim($_POST["v21"]))){
        $v21 += 1;
        $sql1 = "UPDATE votes SET v21 = '$v21' WHERE id='$id'";
        if (!mysqli_query($link, $sql1)) {
          echo "Something went wrong.";
        }    
    }

    if(!empty(trim($_POST["v22"]))){
        $v22 += 1;
        $sql1 = "UPDATE votes SET v22 = '$v22' WHERE id='$id'";
        if (!mysqli_query($link, $sql1)) {
          echo "Something went wrong.";
        }    
    }

    if(!empty(trim($_POST["v23"]))){
        $v23 += 1;
        $sql1 = "UPDATE votes SET v23 = '$v23' WHERE id='$id'";
        if (!mysqli_query($link, $sql1)) {
          echo "Something went wrong.";
        }    
    }

    if(!empty(trim($_POST["v31"]))){
        $v31 += 1;
        $sql1 = "UPDATE votes SET v31 = '$v31' WHERE id='$id'";
        if (!mysqli_query($link, $sql1)) {
          echo "Something went wrong.";
        }    
    }

    if(!empty(trim($_POST["v32"]))){
        $v32 += 1;
        $sql1 = "UPDATE votes SET v32 = '$v32' WHERE id='$id'";
        if (!mysqli_query($link, $sql1)) {
          echo "Something went wrong.";
        }    
    }

    if(!empty(trim($_POST["v33"]))){
        $v33 += 1;
        $sql1 = "UPDATE votes SET v33 = '$v33' WHERE id='$id'";
        if (!mysqli_query($link, $sql1)) {
          echo "Something went wrong.";
        }    
    }

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <!-- styles CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

  <title>Cypress Vote</title>
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
      <!--
          <h1 id="NavHeadingLeft">Cypress</h1>
          <img id="NavHeadingRight" class="resize center" src="https://i0.wp.com/silentvoice.ca/wp-content/uploads/2017/04/city-toronto-logo.png?ssl=1" alt="City of Toronto">
          -->
      <hr id="NavHeadingCenter">

      <div class="votingScreen cardText">
        <div class="votingRows">
          <p class="question">Question 1</p>
          <div class="row">
            <div class="container">
              <p>Vote</p>
              <img src="https://i.pinimg.com/originals/bc/ac/63/bcac631c0f35075b6eb9d57710e7bfbe.gif" />
              <div class="voting">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <button type="submit" name="v11" id="likebtn1" value="1">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <input type="number" id="input1" value="<?php echo $v11?>">
                </form>
              </div>
            </div>
            <div class="container">
              <p>Vote</p>
              <img src="https://i.pinimg.com/originals/f1/6a/15/f16a15b5b9ea759dfb468c53fcbb4f4f.gif" />
              <div class="voting">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <button type="submit" name="v12" id="likebtn2" value="1">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <input type="number" id="input2" value="<?php echo $v12?>">
                </form>
              </div>
            </div>
            <div class="container">
              <p>Vote</p>
              <img src="https://i.pinimg.com/originals/b9/c8/d2/b9c8d2c3b3eaefa6d2fd7b7377bb6a78.gif" />
              <div class="voting">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <button type="submit" name="v13" id="likebtn3" value="1">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <input type="number" id="input3" value="<?php echo $v13?>">
                </form>
              </div>
            </div>
          </div>
          <p class="question">Question 2</p>
          <div class="row">
            <div class="container">
              <p>Vote</p>
              <img src="https://i.pinimg.com/originals/5a/b5/8b/5ab58b8180f1649927f9c85599593979.gif" />
              <div class="voting">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <button type="submit" name="v21" id="likebtn4" value="1">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <input type="number" id="input4" value="<?php echo $v21?>">
                </form>
              </div>
            </div>
            <div class="container">
              <p>Vote</p>
              <img src="https://i.pinimg.com/originals/76/ae/78/76ae78bc1ee7a091612118dbcec0578c.gif" />
              <div class="voting">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <button type="submit" name="v22" id="likebtn5" value="1">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <input type="number" id="input5" value="<?php echo $v22?>">
                </form>
              </div>
            </div>
            <div class="container">
              <p>Vote</p>
              <img src="https://i.pinimg.com/originals/61/08/c8/6108c8f614720cf06e6b6898845bf0e2.gif" />
              <div class="voting">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <button type="submit" name="v23" id="likebtn6" value="1">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <input type="number" id="input6" value="<?php echo $v23?>">
                </form>
              </div>
            </div>
          </div>
          <p class="question">Question 3</p>
          <div class="row">
            <div class="container">
              <p>Vote</p>
              <img src="https://i.pinimg.com/originals/91/23/95/912395b4be4282562fdc548f03b4e6a6.gif" />
              <div class="voting">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <button type="submit" name="v31" id="likebtn7" value="1">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <input type="number" id="input7" value="<?php echo $v31?>">
                </form>
              </div>
            </div>
            <div class="container">
              <p>Vote</p>
              <img src="https://i.pinimg.com/originals/bd/25/b8/bd25b8ee56776d29a85402fc20bd40a6.gif" />
              <div class="voting">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <!--<div style="z-index:100">-->
                    <button type="submit" name="v32" id="likebtn8" value="1">
                      <i class="fa fa-thumbs-up"></i>
                    </button>
                    <input type="number" id="input8" value="<?php echo $v32?>">
                    <!--</div>-->
                </form>
              </div>
            </div>
            <div class="container">
              <p>Vote</p>
              <img src="https://i.pinimg.com/originals/40/d0/ef/40d0ef1f17b21c3e58c55fa8ace003ab.gif" />
              <div class="voting">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <button type="submit" name="v33" id="likebtn9" value="1">
                    <i class="fa fa-thumbs-up"></i>
                  </button>
                  <input type="number" id="input9" value="<?php echo $v33?>">
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="titleArea">
          
        </div>
      </div>
    </div>
  </section>
</body>

</html>