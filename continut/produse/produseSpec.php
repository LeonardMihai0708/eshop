<div>&nbsp;</div><div class="clearfix">&nbsp;</div>


<?php
if(isset($_GET['filtre_form'])){
    switch($_GET['filtre_form']){
        case 'recomandate':
            $verificare = "SELECT * FROM produse where valabilitate='1';";
            break;
        case 'crescator':
            $verificare = "SELECT * FROM produse where valabilitate='1' ORDER BY pret ASC;";
            break;
        case 'descrescator': 
            $verificare = "SELECT * FROM produse where valabilitate='1' ORDER BY pret DESC;";
            break;
        }
} else{
    $verificare = "SELECT * FROM produse where valabilitate='1';";
}
if(isset($_GET['filtre_CAT'])){
    $verificare = "SELECT * FROM produse where valabilitate='1' AND categorie='".$_GET['filtre_CAT']."';";
}

$verificare_sql = mysqli_query($conn,$verificare);
if (mysqli_num_rows($verificare_sql) > 0) {
    while($row = mysqli_fetch_assoc($verificare_sql)){
        echo '<div class="card" style="width:300px;">
        <img class="card-img-top" src="continut/produse/img_produse/'.$row["denumire_poza"].'" alt="Card image" style="width:100%;">
        <div class="card-body" style="">
            <h4 class="card-title">';
        print_r($row["titlu"]);
        echo '</h4>
        <p class="card-text" style="text-transform: uppercase;">';
        print_r($row["categorie"]);
        echo '</p>';
        echo '<p class="card-text" style="font-size:12px;">';
        print_r($row["descriere"]);
        echo '</p>';
        echo '<h5 class="card-text">';
        print_r($row["pret"]);
        echo " RON";
        echo '</h5>';
        echo '
            <br>
            <form action="includes/produsCosAdaug.inc.php?ext='.$row["denumire_poza"].'" method="POST">
                <button href="" class="btn btn-primary btn-special" style="text-transform: capitalize; padding-top:10px" name="'.$row["denumire_poza"].'""><i class="fas fa-shopping-cart"></i><span class="cos"><br>Adaugă în coș</span></button>
            </form>
        </div>
        </div>';

    }
}
?>

