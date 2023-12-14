<?php
  include_once "includes/dbs.inc.php";
  session_start();
  if (!isset($_SESSION['produseCos'])) {
    $_SESSION['produseCos'] = array();
  }
  $_SESSION['checkout_status'] = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Primary Meta Tags -->
    <title>VanVanillaSweet.com</title>
    <meta name="title" content="VanVanillaSweet.com">
    <meta name="description" content="Van Vanila Sweet, denumirea comercială VANILA SWEET EXPO SRL, având sediul social în Loc. Nicolae Bălcescu, Oraș Flămânzi, Strada Urcusului">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="VanVanillaSweet.com">
    <meta property="og:description" content="Van Vanila Sweet, denumirea comercială VANILA SWEET EXPO SRL, având sediul social în Loc. Nicolae Bălcescu, Oraș Flămânzi, Strada Urcusului">
    <meta property="og:image" content="img/logo_transparent.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="VanVanillaSweet.com">
    <meta property="twitter:description" content="Van Vanila Sweet, denumirea comercială VANILA SWEET EXPO SRL, având sediul social în Loc. Nicolae Bălcescu, Oraș Flămânzi, Strada Urcusului">
    <meta property="twitter:image" content="img/logo_transparent.png">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <base href="index.php">
    <link rel="icon" type="image/jpg" href="img/logo_transparent.png" >
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="css/tsc.css">
    <link rel="stylesheet" href="continut/css_continut/continut.css">
    <link rel="stylesheet" href="css/cookies.css">
</head>
<body>
<?php
  if(isset($_SESSION['nume_prenume']) && $_SESSION){
    include_once 'stare_navbar/logged.php';
  } else{
    include_once 'stare_navbar/guest.php';
  }
?>
<?php
  include_once "cookies.php";
?>
<?php
  include_once "info/tsc.php";
?>

<div>&nbsp;</div><div class="clearfix">&nbsp;</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>