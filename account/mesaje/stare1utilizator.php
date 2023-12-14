<center>

    <div class="container_table">
        <h3>
            <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
            <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
            <?php 
            if(isset($_GET['mesaj'])){
                switch ($_GET['mesaj']) {
                    case 'stare_mesaj_nec':
                        echo 'Vă rugăm să alegeți o noua stare a mesajului!';
                        break;
                    case 'numar_mesaj_invalid':
                        echo 'Acest număr nu este asociat unui mesaj!';
                        break;
                    case 'numar_mesaj_nec':
                        echo 'Vă rugăm să alegeți numărul mesajului!';
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
            include_once 'filtre_mesaje.php';
            $_SESSION['i']=0;
            if(isset($_POST['submit_filtre'])){
                if($_POST['filtre_stare']!='def'){
                    $verificare = "SELECT * FROM mesaje WHERE stare='".$_POST['filtre_stare']."';";
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
                        $verificare = "SELECT * FROM mesaje WHERE id>=25*$i AND id<25*($i+1) AND stare='".$_POST['filtre_stare']."' AND judet='".$_POST['filtre_judet']."';";
                        $verificare_sql = mysqli_query($conn,$verificare);
                    } else {
                        $pages = 1;
                    }
                } else {
                    $verificare = "SELECT * FROM mesaje;";
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
                        $verificare = "SELECT * FROM mesaje WHERE id>25*$i AND id<=25*$k;";
                        $verificare_sql = mysqli_query($conn,$verificare);
                    } else {
                        $pages = 1;
                    }
                }
            } else {
                $verificare = "SELECT * FROM mesaje;";
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
                    $verificare = "SELECT * FROM mesaje WHERE id>25*$i AND id<=25*$k;";
                    $verificare_sql = mysqli_query($conn,$verificare);
                } else {
                    $pages = 1;
                }
            }
            $nr = "SELECT id FROM mesaje";
            $nr_sql = mysqli_query($conn,$nr);
            if (mysqli_num_rows($nr_sql) > 0){
                $_SESSION['numar_mesaje_id'] = mysqli_num_rows($verificare_sql);
            }
            if (mysqli_num_rows($verificare_sql) > 0) {
                echo '<table>
                            <tr>
                            <th>Număr Mesaj</th>
                            <th>Nume si Prenume</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th>Data Mesaj</th>
                            <th>Mesaj</th>
                            <th>Subiect</th>
                            <th>Stare</th>
                        </tr>';
                while($row = mysqli_fetch_assoc($verificare_sql)){
                    echo "<tr>";
                    echo '<td>'.$row["id"].'</td>';
                    echo '<td>'.$row["nume_prenume"].'</td>';
                    echo '<td>'.$row["telefon"].'</td>';
                    echo '<td>'.$row["email"].'</td>';
                    echo '<td>'.$row["data_plasare"].'</td>';
                    echo '<td>'.$row["mesaj"].'</td>';
                    echo '<td>'.$row["subiect"].'</td>';
                    echo '<td>';
                    switch ($row["stare"]) {
                        case 1:
                            echo 'Client a fost contactat</td>';
                            break;
                        case 0:
                            echo 'Clientul nu a fost contactat</td>';
                            break;
                        
                    }
                    echo "</tr>";
                    
                }
                echo '</table>';
                echo '<div class="container_table">
                <form action="account/mesaje.php" method="POST" class="newsletter_conf">';
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
                echo '<h4>Nu există mesaje până în acest moment!</h4>';
            }
        ?><br>
        
    </div>
</center>
<div>&nbsp;</div><div class="clearfix">&nbsp;</div>
<div class="container">
    <?php
            $verificare = "SELECT * FROM mesaje;";
            $verificare_sql = mysqli_query($conn,$verificare);
            if (mysqli_num_rows($verificare_sql) > 0) {
                echo '
                <h3>
                    Schimbă starea mesajelor
                </h3>
                <form action="includes/stare_mesaj_update.inc.php" method="POST" class="newsletter_conf col-md-12">
                    <label for="mesaj">Alege numărul mesajului:</label> <br>
                    <select name="numar_mesaj" id="mesaj">
                        <option value="nec">Alegeti numărul mesajului..</option>';
                    while($row = mysqli_fetch_assoc($verificare_sql)){
                        echo'<option value="'.$row['id'].'">'.$row['id'].': '.$row['nume_prenume'].'</option>';
                    }

                    echo '
                    </select>
                    <p>
                    <br>
                    Puteți să scrieți numarul mesajului mai jos daca nu îl gasiți în listă!
                    </p>  
                    <input id="numar_mesaj_var2" type="number" name="numar_mesaj_var2">
                    <br><br>
                    <select name="stare" id="stare">
                        <option value="nec">Alegeti starea mesajului..</option>
                        <option value="0">Client necontactat</option>
                        <option value="1">Client contactat</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Finalizați" name="submit">';
                echo '</form>';
            }
        ?>
</div>