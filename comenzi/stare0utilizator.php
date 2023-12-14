<center>
<div>&nbsp;</div><div class="clearfix">&nbsp;</div>
<div>&nbsp;</div><div class="clearfix">&nbsp;</div>
    <div class="container col-lg-11">
        <h3>
            Bine ai venit <?php echo $_SESSION['nume_prenume']; ?>!
        </h3>
        <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
        <?php
            $_SESSION['i']=0;
            $email = $_SESSION['email'];
            $verificare = "SELECT * FROM comenzi where email='$email';";
            $verificare_sql = mysqli_query($conn,$verificare);
            if (mysqli_num_rows($verificare_sql) > 0) {
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
                        echo "<br>";
                        foreach($array as $prod){
                            if($nr%2==0){
                                $search = 'SELECT titlu from produse Where denumire_poza="'.$prod.'"';
                                $search_sql = mysqli_query($conn,$search);
                                if (mysqli_num_rows($search_sql) > 0){
                                    while($titlu = mysqli_fetch_assoc($search_sql)){
                                        echo '<center><div style="background-color:#000000; height:2px; width:80%;"></div></center>';
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
                                echo '<br><center><div style="background-color:#000000; height:2px; width:80%;"></div></center><br>';
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
                echo '<h4>Nu există comenzi pe adresa de email: '.$email.'</h4>';
            }
        ?>

    </div>
</center>