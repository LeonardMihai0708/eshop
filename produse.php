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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Stint+Ultra+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap" rel="stylesheet">



    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="img/logo_transparent.png" >
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="continut/css_continut/continut.css">
    <link rel="stylesheet" href="css/produse.css">
</head>
<body>

    <?php
    if(isset($_SESSION['nume_prenume']) && $_SESSION){
        include_once 'stare_navbar/logged.php';
    } else{
        include_once 'stare_navbar/guest.php';
    }

    $count_r = "SELECT COUNT(*) FROM produse";
    $c_sql = mysqli_query($conn,$count_r);
    $c_sqlf = mysqli_fetch_assoc($c_sql);
    $max = $c_sqlf["COUNT(*)"];
    $randoLista = rand(1, $max);
    $verificare = "SELECT * FROM produse where id = $randoLista AND valabilitate='1';";
    $verificare_sql = mysqli_query($conn,$verificare);
    $ok = 1;
    while($ok==1){
        if(mysqli_num_rows($verificare_sql)!=0)
            while($row = mysqli_fetch_assoc($verificare_sql)){
                $ok = 0;
                echo '
                <div class="parallax" id="home" style="';

                echo"background: linear-gradient(-70deg, rgb(235, 221, 160) 30%, rgba(0, 0, 0, 0) 50%), url('continut/produse/img_produse/produse_background.png');";
                echo'">
                    <div class="parallaxBack"></div>
                    <img src="continut/produse/img_produse/'.$row['denumire_poza'].'" alt="">
                    <h1 style="text-align: left;">'.$row['titlu'].'</h1>
                    <h3>'.$row['pret'].' RON</h3>
                </div>
                ';
                echo'
                ';
        }
        else{
            $max = $c_sqlf["COUNT(*)"];
            $randoLista = rand(1, $max);
            $verificare = "SELECT * FROM produse where id = $randoLista AND valabilitate='1';";
            $verificare_sql = mysqli_query($conn,$verificare);
        }
    } 
    ?>

    <div class="filtre">
        <center>
            <form name="filtreORD" action="" method="GET" class="filtreORD"> 
                <label for="filtre_form">Ordonează:</label>
                <select id="filtre_form" name="filtre_form" class="filtre_form">
                    <?php
                        if(isset($_GET['filtre_form'])){
                            switch($_GET['filtre_form']){
                                case 'recomandate':
                                    echo'<option value="recomandate">Recomandate</option>
                                    <option value="crescator">Crescător</option>
                                    <option value="descrescator">Descrescător</option>';
                                    break;
                                case 'crescator':
                                    echo'<option value="crescator">Crescător</option>
                                        <option value="descrescator">Descrescător</option>
                                        <option value="recomandate">Recomandate</option>
                                    </select>';
                                    break;
                                case 'descrescator': 
                                    echo '<option value="descrescator">Descrescător</option>
                                    <option value="recomandate">Recomandate</option>
                                    <option value="crescator">Crescător</option>';
                                    break;
                                }
                        } else{
                            echo'<option value="recomandate">Recomandate</option>
                                <option value="crescator">Crescător</option>
                                <option value="descrescator">Descrescător</option>';
                        }
                    ?>
                </select>
            </form>
            <form action="" name="filtreCAT" method="GET" class="filtreCAT">
                <label for="filtre_CAT">Categoria de produse:</label>
                <select id="filtre_CAT" name="filtre_CAT" class="filtre_CAT">
                <?php
                $categorii = array();
                $prd_trecut= "";
                $verificare = "SELECT categorie FROM produse where valabilitate='1';";
                $verificare_sql = mysqli_query($conn,$verificare);
                if (mysqli_num_rows($verificare_sql) > 0) {
                    while($row = mysqli_fetch_assoc($verificare_sql)){
                        if($row['categorie']==""){
                            array_push($categorii,$row['categorie']);
                            $prd_trecut = $row['categorie'];
                        } else{
                            if($prd_trecut != $row['categorie']){
                                array_push($categorii,$row['categorie']);
                                $prd_trecut = $row['categorie'];
                            }
                        }
                    }
                }
                foreach ($categorii as $value) {
                    echo '<option value="'.$value.'">'.$value.'</option>';
                }
                
                ?>
                </select>
            </form>
        </center>
    </div>

    <a href="#home"><i class="fas fa-level-up-alt"></i></a>

    <center>
    <div class="continut col-lg-11">  
        <?php
        include_once "continut/produse/produseSpec.php";
        ?>
    </div>
    </center> 

    <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
    <?php
        include_once "copyright.php";
    ?>
    
<script src="js/scroll.js"></script>
<script src="js/autoSubmit.js"></script>
<script src="js/effectProdh1.js"></script>
<script src="js/effectProdh2.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>