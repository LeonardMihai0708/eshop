<?php
  include_once "../../includes/dbs.inc.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <base href="../../index.php">
    <link rel="icon" type="image/jpg" href="img/logo_transparent.png" >
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="continut/css_continut/continut.css">
    <link rel="stylesheet" href="account/add_item/add_item.css">
    <link rel="stylesheet" href="css/cookies.css">
</head>
<body>
    

    <?php

    if(isset($_SESSION['nume_prenume']) && $_SESSION){
        include_once '../../stare_navbar/logged.php';
        echo '<div class="container col-lg-11">
        ';

        echo '
        <center>
            <h1>Salut '.$_SESSION['nume_prenume'].'!</h1>
        </center>
        ';

        echo '
        
        <div class="container col-lg-12">
            <h3>Adăugați un produs.</h3>
            <form action="includes/insert_item.inc.php" class="produsForm" method="POST" enctype="multipart/form-data">
                <label for="nume_produs">Denumire:</label>
                <input type="text" id="nume_produs" name="nume_produs" placeholder="Exemplu: Domeniko 1.8Kg (nume_prod+cantitate).." required><br>
                <label for="descriere_produs">Descriere:</label>
                <input type="text" id="descriere_produs" name="descriere_produs" placeholder="Descriere Produs.." required><br>
                <label for="categorie">Categorie:</label>
                <input type="text" id="categorie" name="categorie" placeholder="Categorie Produs.." required><br>
                <label for="pret_produs">Preț:</label>
                <input type="text" id="pret_produs" name="pret_produs" placeholder="Exemplu: 10 (Fara Euro).." required><br><br>
                <input type="file" name="file" required><br><br>
                <button type="submit" name="submit">Adaugă Produsul</button>
            </form>
        </div>
        
        ';

        echo '
        </div>';

        $verificare = "SELECT titlu FROM produse where valabilitate='1';";
        $verificare_sql = mysqli_query($conn,$verificare);
        if (mysqli_num_rows($verificare_sql) > 0){
            echo '<div class="container col-lg-11">
            <div class="container containerSTR col-lg-12">
                <h3>Ștegeți un produs.</h3>
                <form action="includes/delete_item.inc.php" class="produsForm" method="POST" enctype="multipart/form-data">
                    <select id="produs" name="produs" class="produs">';
                        while($row = mysqli_fetch_assoc($verificare_sql)){
                            echo '<option value="'.$row['titlu'].'">'.$row['titlu'].'</option>';
                        }
            echo '  </select>
                    <button type="submit" name="submit">Sterge Produsul</button>
                </form>
            </div>
            </div>';
        } else {
            echo '<div class="container col-lg-11">
            <div class="container col-lg-8">
                <center><h3>Nu există produse adăugate până în acest moment.</h3></center>
            </div>
            </div>';
        }

    } else {
        header('Location: ../../index.php');
    }

    ?>

<div>&nbsp;</div><div class="clearfix">&nbsp;</div>
<?php
  include_once "../../copyright.php";
?>
<?php
  include_once "../../cookies.php";
?>
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>