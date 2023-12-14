<center>

    <div class="container_table">
        <h3>
            <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
            <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
            <?php 
            if(isset($_GET['comenzi'])){
                switch ($_GET['comenzi']) {
                    case 'stare_comanda_nec':
                        echo 'Vă rugăm să alegeți o noua stare a comenzii!';
                        break;
                    case 'numar_comanda_invalid':
                        echo 'Acest număr este asociat unei comenzi!';
                        break;
                    case 'numar_comanda_nec':
                        echo 'Vă rugăm să alegeți numărul comenzii!';
                        break;
                    
                    default:
                        break;
                }
            } else {
                echo 'Bine ai venit '.$_SESSION['nume_prenume'].'!';
            }
            ?>
        </h3>
        <div>&nbsp;</div><div class="clearfix">&nbsp;</div>

        <?php
            include_once 'comenzi/filtre_comenzi.php';
            $_SESSION['i']=0;
            if(isset($_POST['submit_filtre'])){
                if($_POST['filtre_stare']!='def' && $_POST['filtre_judet'] != 'def'){
                    $verificare = "SELECT * FROM comenzi WHERE stare='".$_POST['filtre_stare']."' AND judet='".$_POST['filtre_judet']."';";
                    $verificare_sql = mysqli_query($conn,$verificare);
                    if(mysqli_num_rows($verificare_sql) > 25){
                        $pages = mysqli_num_rows($verificare_sql)/25;
                        if(mysqli_num_rows($verificare_sql)%25 > 0){
                            $pages++;
                        }
                        if(isset($_POST['pagina'])){
                            $i = $_POST['pagina'] - 1;
                        } else {
                            $i = 0;
                        }
                        $verificare = "SELECT * FROM comenzi WHERE id>=25*$i AND id<25*($i+1) AND stare='".$_POST['filtre_stare']."' AND judet='".$_POST['filtre_judet']."';";
                        $verificare_sql = mysqli_query($conn,$verificare);
                    } else {
                        $pages = 1;
                    }
                }
                if($_POST['filtre_stare']!='def' && $_POST['filtre_judet'] == 'def'){
                    $verificare = "SELECT * FROM comenzi WHERE stare='".$_POST['filtre_stare']."';";
                    $verificare_sql = mysqli_query($conn,$verificare);
                    if(mysqli_num_rows($verificare_sql) > 25){
                        $pages = mysqli_num_rows($verificare_sql)/25;
                        if(mysqli_num_rows($verificare_sql)%25 > 0){
                            $pages++;
                        }
                        if(isset($_POST['pagina'])){
                            $i = $_POST['pagina'] - 1;
                        } else {
                            $i = 0;
                        }
                        $verificare = "SELECT * FROM comenzi WHERE id>=25*$i AND id<25*($i+1) AND stare='".$_POST['filtre_stare']."';";
                        $verificare_sql = mysqli_query($conn,$verificare);
                    } else {
                        $pages = 1;
                    }
                }
                if($_POST['filtre_stare']=='def' && $_POST['filtre_judet'] != 'def'){
                    $verificare = "SELECT * FROM comenzi WHERE judet='".$_POST['filtre_judet']."';";
                    $verificare_sql = mysqli_query($conn,$verificare);
                    if(mysqli_num_rows($verificare_sql) > 25){
                        $pages = mysqli_num_rows($verificare_sql)/25;
                        if(mysqli_num_rows($verificare_sql)%25 > 0){
                            $pages++;
                        }
                        if(isset($_POST['pagina'])){
                            $i = $_POST['pagina'] - 1;
                        } else {
                            $i = 0;
                        }
                        $verificare = "SELECT * FROM comenzi WHERE id>=25*$i AND id<25*($i+1) AND judet='".$_POST['filtre_judet']."';";
                        $verificare_sql = mysqli_query($conn,$verificare);
                    } else {
                        $pages = 1;
                    }
                }
                if($_POST['filtre_stare']=='def' && $_POST['filtre_judet'] == 'def'){
                    $verificare = "SELECT * FROM comenzi;";
                    $verificare_sql = mysqli_query($conn,$verificare);
                    if(mysqli_num_rows($verificare_sql) > 25){
                        $pages = mysqli_num_rows($verificare_sql)/25;
                        if(mysqli_num_rows($verificare_sql)%25 > 0){
                            $pages++;
                        }
                        if(isset($_POST['pagina'])){
                            $i = $_POST['pagina'] - 1;
                        } else {
                            $i = 0;
                        }
                        $verificare = "SELECT * FROM comenzi WHERE id>25*$i AND id<=25*($i+1);";
                        $verificare_sql = mysqli_query($conn,$verificare);
                    } else {
                        $pages = 1;
                    }
                }
            } else {
                $verificare = "SELECT * FROM comenzi;";
                $verificare_sql = mysqli_query($conn,$verificare);
                if(mysqli_num_rows($verificare_sql) > 25){
                    $pages = mysqli_num_rows($verificare_sql)/25;
                    if(mysqli_num_rows($verificare_sql)%25 > 0){
                        $pages++;
                    }
                    if(isset($_POST['pagina'])){
                        $i = $_POST['pagina'] - 1;
                    } else {
                        $i = 0;
                    }
                    $k = $i + 1;
                    $verificare = "SELECT * FROM comenzi WHERE id>25*$i AND id<=25*$k;";
                    $verificare_sql = mysqli_query($conn,$verificare);
                } else {
                    $pages = 1;
                }
            }
            $nr = "SELECT id FROM comenzi";
            $nr_sql = mysqli_query($conn,$nr);
            if (mysqli_num_rows($nr_sql) > 0){
                $_SESSION['numar_comenzi_id'] = mysqli_num_rows($verificare_sql);
            }
            if (mysqli_num_rows($verificare_sql) > 0) {
                echo '<table>
                    <tr>
                        <th>Număr Comandă</th>
                        <th>Nume si Prenume</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Judet</th>
                        <th>Localitate</th>
                        <th>Adresa</th>
                        <th>Produse</th>
                        <th>Pret Total</th>
                        <th>Stare Comanda</th>
                    </tr>';
                while($row = mysqli_fetch_assoc($verificare_sql)){
                    echo "<tr>";
                    echo '<td>'.$row["id"].'</td>';
                    echo '<td>'.$row["nume_prenume"].'</td>';
                    echo '<td>'.$row["telefon"].'</td>';
                    echo '<td>'.$row["email"].'</td>';
                    echo '<td>'.$row["judet"].'</td>';
                    echo '<td>'.$row["localitate"].'</td>';
                    echo '<td>'.$row["adresa"].'</td>';
/*
                    print_r(explode( ' ', $row["produse"] ) );
*/
                    echo '<td>';
                    $array = explode( ' ', $row["produse"] );
                    $nr=2;
                    foreach($array as $prod){
                        if($nr%2==0){
                            $search = 'SELECT titlu from produse Where denumire_poza="'.$prod.'"';
                            $search_sql = mysqli_query($conn,$search);
                            if (mysqli_num_rows($search_sql) > 0){
                                while($titlu = mysqli_fetch_assoc($search_sql)){
                                    echo 'Produs: ';
                                    echo $titlu['titlu'];
                                    echo "<br>";
                                }
                            } else {
                                echo 'Eroare titlu';
                                echo "<br>";
                            }
                        } else {
                            echo "Cantitate: ".$prod;
                            echo '<br><center><div style="background-color:#000000; height:2px; width:80%;"></div></center>';
                        }
                        $nr++;
                    }
                    echo '</td>';
                    echo '<td>'.$row["pret_total"].'</td>';
                    echo '<td>';
                    switch ($row["stare"]) {
                        case 1:
                            echo 'Comanda Plasată</td>';
                            break;
                        
                        case 2:
                            echo 'Client Contactat</td>';
                            break;
                        case 3:
                            echo 'Comanda în livrare</td>';
                            break;
                        case 0:
                            echo 'Comanda Finalizată</td>';
                            break;
                        
                    }
                    echo "</tr>";
                    
                }
                echo '</table>';
                echo '<div class="container_table">
                <form action="comenzi.php" method="POST" class="newsletter_conf">';
                for($k=1;$k<=$pages;$k++){
                    if(isset($_POST['pagina'])){
                        if($k == $_POST['pagina']){
                            echo '<input type="submit" value="'.$k.'" name="pagina" class="pagina_curenta">';
                        } else{
                            echo '<input type="submit" value="'.$k.'" name="pagina" class="pagini">';
                        }
                    } else {
                        if($k == 1){
                            echo '<input type="submit" value="'.$k.'" name="pagina" class="pagina_curenta">';
                        } else {
                            echo '<input type="submit" value="'.$k.'" name="pagina" class="pagini">';
                        }
                    }
                }
                echo '</form></div>';
            } else {
                echo '<h4>Nu există comenzi până în acest moment!</h4>';
            }
        ?><br>
        
    </div>
</center>
<div>&nbsp;</div><div class="clearfix">&nbsp;</div>
<div class="container">
    <?php
            $verificare = "SELECT * FROM comenzi WHERE stare != 0;";
            $verificare_sql = mysqli_query($conn,$verificare);
            if (mysqli_num_rows($verificare_sql) > 0) {
                echo '
                <h3>
                    Schimbă starea comenzilor
                </h3>
                <form action="includes/stare_comanda_update.inc.php" method="POST" class="newsletter_conf col-md-12">
                <label for="comanda">Alege numărul comenzii:</label> <br>
                <select name="numar_comanda" id="comanda">
                    <option value="nec">Alegeti numărul comenzii..</option>';
                while($row = mysqli_fetch_assoc($verificare_sql)){
                    echo'<option value="'.$row['id'].'">'.$row['id'].': '.$row['nume_prenume'].'</option>';
                }

                echo '
                </select>
                <p>
                <br>
                Puteți să scrieți numarul comenzii mai jos daca nu îl gasiți în listă!
                </p>  
                <input id="numar_comanda_var2" type="number" name="numar_comanda_var2">
                <br><br>
                <select name="stare" id="stare">
                    <option value="nec">Alegeti starea comenzii..</option>
                    <option value="1">Comanda Plasată</option>
                    <option value="2">Client Contactat</option>
                    <option value="3">Comanda în livrare</option>
                    <option value="0">Comanda Finalizată</option>
                </select>
                <br><br>
                <input type="submit" value="Finalizați" name="submit">';
                echo '</form>';
            }
        ?>
</div>