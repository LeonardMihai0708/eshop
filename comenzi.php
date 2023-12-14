<?php
include_once "includes/dbs.inc.php";
session_start();
if (!isset($_SESSION['produseCos'])) {
    $_SESSION['produseCos'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
  include_once "meta_tags.php";
?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <base href="index.php">
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
        include_once 'stare_navbar/logged.php';
        if($_SESSION['stare']==1 && $_SESSION && $verificare_stare_final['stare']==1){
            include_once 'comenzi/stare1utilizator.php';
        }
        else{
            include_once 'comenzi/stare0utilizator.php';
        }
    } else{
        header('Location: index.php');
    }
?>

<div>&nbsp;</div><div class="clearfix">&nbsp;</div>


<div>&nbsp;</div><div class="clearfix">&nbsp;</div>
<?php
  include_once "copyright.php";
?>
<?php
  include_once "cookies.php";
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>