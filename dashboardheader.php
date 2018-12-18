<?php
if(!(isset($_SESSION['email']) && $_SESSION['email'] != '')){
    header ("Location:index.php");
}
if (isset($_POST["logout"])){
    session_unset();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title> DIGITAL ADVOCATE DIARY</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/logreg.css">

</head>

<body>
<!-- Header -->
<!-- Background Image -->
<div class="bg-img" style="background-image: url('./img/background1.jpg');">
    <div class="overlay"></div>
</div>
<!-- /Background Image -->

<!-- Nav -->
<nav id="nav" class="navbar nav-transparent">
    <div class="container">

        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a href="dashboard.php">
                    <img class="logo" src="img/logo.png" alt="logo">
                    <img class="logo-alt" src="img/logo-alt.png" alt="logo">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Collapse nav button -->
            <div class="nav-collapse">
                <span></span>
            </div>
            <!-- /Collapse nav button -->
        </div>

        <!--  Main navigation  -->
        <ul class="main-nav nav navbar-nav navbar-right">
            <li><a href="dashboard.php">HOME</a></li>
            <li><a href="profile.php">PROFILE</a></li>
            <li><a href="#contact">CONTACT</a></li>
            <li>
                <form action="" method="post">
                    <input name="logout" type="submit" value="log out">
                </form>
            </li>

        </ul>
        <!-- /Main navigation -->
    </div>
</nav>
<!-- /Nav -->


<!-- start reg log part -->