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
            $verificare = "SELECT * FROM mesaje where email='$email';";
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
                    $verificare = "SELECT * FROM mesaje WHERE id>25*$i AND id<=25*$k;";
                    $verificare_sql = mysqli_query($conn,$verificare);
                } else {
                    $pages = 1;
                }
                echo '<table>
                    <tr>
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
                        echo '<td>'.$row["nume_prenume"].'</td>';
                        echo '<td>'.$row["telefon"].'</td>';
                        echo '<td>'.$row["email"].'</td>';
                        echo '<td>'.$row["data_plasare"].'</td>';
                        echo '<td>'.$row["mesaj"].'</td>';
                        echo '<td>'.$row["subiect"].'</td>';
                        echo '<td>';
                        switch ($row["stare"]) {
                            case 1:
                                echo 'Client a fost contactat!</td>';
                                break;
                            case 0:
                                echo 'Clientul nu a fost contactat!</td>';
                                break;
                            
                        }
                        echo "</tr>";
                        
                    }
                echo '</table>';
                echo '<div class="container_table">
                <form action="mesaje.php" method="POST" class="newsletter_conf">';
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
                echo '<h4>Nu există mesaje pe adresa de email: '.$email.'</h4>';
            }
        ?>

    </div>
</center>