<?php
include_once "../includes/dbs.inc.php";
session_start();
if (!isset($_SESSION['produseCos'])) {
    $_SESSION['produseCos'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Primary Meta Tags -->
    <title>VanVanila Sweet</title>
    <meta name="title" content="Piese Dodge - Romania">
    <meta name="description" content="Din cauza faptului că românii gasesc foarte greu anumite piese de Dodge, ne-am gândit să venim în ajutorul acestora cu un proiect care are scopul de a găsi piesele dorite mașinii lor, marca Dodge, în cel mai scurt timp. 

    Ideea proiectului a venit în urma problemelor asemănatoare întâmpinate de către fondator.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="#">
    <meta property="og:title" content="Piese Dodge - Romania">
    <meta property="og:description" content="Din cauza faptului că românii gasesc foarte greu anumite piese de Dodge, ne-am gândit să venim în ajutorul acestora cu un proiect care are scopul de a găsi piesele dorite mașinii lor, marca Dodge, în cel mai scurt timp. 

    Ideea proiectului a venit în urma problemelor asemănatoare întâmpinate de către fondator.">
    <meta property="og:image" content="#">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="#">
    <meta property="twitter:title" content="Piese Dodge - Romania">
    <meta property="twitter:description" content="Din cauza faptului că românii gasesc foarte greu anumite piese de Dodge, ne-am gândit să venim în ajutorul acestora cu un proiect care are scopul de a găsi piesele dorite mașinii lor, marca Dodge, în cel mai scurt timp. 

    Ideea proiectului a venit în urma problemelor asemănatoare întâmpinate de către fondator.">
    <meta property="twitter:image" content="#">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <base href="../index.php">
    <link rel="icon" type="image/jpg" href="img/logo_transparent.png" >
    <link href="css/navbar_fixed.css" rel="stylesheet">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="css/comenzi.css">
    <link rel="stylesheet" href="css/cookies.css">
</head>
<body>




<?php
    if(isset($_SESSION['nume_prenume']) && $_SESSION){
        $verificare_stare = "Select stare FROM conturi where email='".$_SESSION['email']."';";
        $verificare_stare_sql = mysqli_query($conn,$verificare_stare);
        $verificare_stare_final = mysqli_fetch_assoc($verificare_stare_sql);
        include_once '../stare_navbar/logged.php';
        if($_SESSION['stare']==1 && $_SESSION && $verificare_stare_final['stare']==1){
            include_once 'mesaje/stare1utilizator.php';
        }
        else{
            include_once 'mesaje/stare0utilizator.php';
        }
    } else{
        header('Location: ../index.php');
    }
?>

<div>&nbsp;</div><div class="clearfix">&nbsp;</div>


<div>&nbsp;</div><div class="clearfix">&nbsp;</div>
<?php
  include_once "copyright.php";
?>
<?php
  include_once "../cookies.php";
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>