<!doctype html>
<?php session_start();

?>

<html>
<head>
    <title>TKZYC Health</title>
    <meta http-equiv="Content-Type" content="text/html">
    <link rel="icon" href="images/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Nav bar css -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- jqery -->
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    
    <!-- header css-->
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/6194883d75.js" crossorigin="anonymous"></script>
    
    <!--bootstrap table view-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.16.0/bootstrap-table.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.16.0/bootstrap-table.min.js"></script>

    <!-- bootstrap table mobile view-->
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
      <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" width="150"/>
      </a>
      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#userpart" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" id="usernav">
          <i class="far fa-user"><?php if ($_SESSION["login"]){echo $_SESSION["login_name"];} else {echo 'View account';} ?></i>
        </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" id="bugernav">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="mission.php">
              <div id="leafhover">
                <p>Mission</p>
                <img src="images/hover_header.png"/>
                </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php if ($_SESSION["login"]){echo 'questionnaire.php';} else {echo 'login.php';} ?>">
              <div id="leafhover">
                <p>Questionnaire</p>
                <img src="images/hover_header.png"/>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="knowledge.php">
              <div id="leafhover">
                <p>Knowledge</p>
                <img src="images/hover_header.png"/>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">
              <div id="leafhover">
                <p>Contact Us</p>
                <img src="images/hover_header.png"/>
              </div>
            </a>
          </li>
        </ul>
        
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="userpart">
        <ul class="navbar-nav">
          <li class="nav-item dropdown d-none d-md-block">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-user"><?php if ($_SESSION["login"]){echo $_SESSION["login_name"];} else {echo 'View account';} ?></i>
            </a>
            <div class="dropdown-menu justify-content-end" aria-labelledby="navbarDropdownMenuLink">
              <ul>
                <li>
                  <a class="nav-link" href="<?php if ($_SESSION['login_name']=='admin') {echo 'admin.php';} else if ($_SESSION["login"]){echo 'userinfo.php';} else {echo 'login.php';} ?>" style="display:inline"><?php if ($_SESSION["login"]){echo 'Information';} else {echo 'Login';} ?></a>
                </li>
                <li>
                  <a class="nav-link" href="<?php if ($_SESSION["login"]){echo 'loginValidation.php?logout=true';} else {echo 'registration.php';} ?>" style="display:inline"><?php if ($_SESSION["login"]){echo 'Logout';} else {echo 'Registration';} ?></a>
                </li>
                <li class="d-block d-md-none">

                </li>
              </ul>
            </div>
          </li>
          <li class="d-block d-md-none">
            <a class="nav-link" href="login.php" style="display:inline">Log In</a>
          </li>
          <li class="d-block d-md-none">
            <a class="nav-link" href="registration.php" style="display:inline">Registration</a>
          </li>
          <li class="d-block d-md-none">
            <a class="nav-link" href="/phpmyadmin/index.php" target="_new" style="display:inline">phpMyAdmin</a> <!--Just for convenience [need del]-->
          </li>
        </ul>
    </nav>

<div id="content">