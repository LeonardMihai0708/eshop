<?php
  include_once "../includes/dbs.inc.php";
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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <base href="../index.php">
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="continut/css_continut/continut.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/cookies.css">
</head>
<body>


<?php

  if($_SESSION && isset($_SESSION["nume_prenume"])){
    include_once '../stare_navbar/logged.php';

    echo'
    
    <div class="container">
    ';
    if(isset($_GET['messaj'])){
      switch ($_GET['messaj']) {
        case 'succes':
          echo '
          <center>
            <h3>Mesajul a fost trimis cu succes! Ve-ți fi contactat în cel mai scurt timp posibil!</h3>
            <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
          </center>
          ';
          break;
        
        default:
          # code...
          break;
      }
    }
    echo '
    
      <form action="includes/contact_c.inc.php" method="POST" class="col-md-6">
        <label for="fname">Subiect:</label>
        <input type="text" id="fname" name="subiect" placeholder="Subiect..">

        <label for="subject">Mesaj:</label>
        <textarea id="subject" name="mesaj" placeholder="Scrie mesajul tau aici.." style="height:200px"></textarea>

        <input type="submit" value="Submit" name="submit">

      </form>

      <style>
        .container .social_media i{
          font-size: 20px;
          padding: 2px;
          color: rgb(223, 4, 4);
          transition: 0.2s;
      }
      </style>
    ';

      include_once 'social_media.php';

    echo '

      <div>&nbsp;</div><div class="clearfix">&nbsp;</div>

      </div>
    ';

  } else{
    include_once '../stare_navbar/guest.php';

    echo'
    
    <div class="container">';
    if(isset($_GET['messaj'])){
      switch ($_GET['messaj']) {
        case 'succes':
          echo '
          <center>
            <h3>Mesajul a fost trimis cu succes! Ve-ți fi contactat în cel mai scurt timp posibil!</h3>
            <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
          </center>
          ';
          break;
        
        default:
          # code...
          break;
      }
    }
    echo '
      <form action="includes/contact_g.inc.php" method="POST" class="col-md-6">

        <label for="nume">Nume:</label>
        <input type="text" id="nume" name="nume" placeholder="Numele Dumneavoastră..">

        <label for="prenume">Prenume:</label>
        <input type="text" id="prenume" name="prenume" placeholder="Prenumele Dumneavoastră..">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email..">
        <br><br>
        <label for="telefon">Telefon:</label>
        <input type="tel" id="telefon" name="telefon" placeholder="Numărul de telefon..">
        <br><br>
        <label for="mesaj">Mesaj:</label>
        <textarea id="mesaj" name="mesaj" placeholder="Mesaj.." style="height:200px"></textarea>

        <label for="subiect">Subject:</label>
        <textarea id="subiect" name="subiect" placeholder="Subiect.." style="height:200px"></textarea>

        <input type="submit" value="Submit" name="submit">

      </form>

      <style>
        .container .social_media i{
          font-size: 38px;
          padding: 40px;
          color: rgb(223, 4, 4);
          transition: 0.2s;
      }
      </style>

      ';

      include_once 'social_media.php';

    echo '

      <div>&nbsp;</div><div class="clearfix">&nbsp;</div>

    </div>
    ';

  }
?>

<div>&nbsp;</div><div class="clearfix">&nbsp;</div>
<?php
  include_once "../copyright.php";
?>
<?php
  include_once "../cookies.php";
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>