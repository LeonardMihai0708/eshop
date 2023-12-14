

<h1 class="cos text-left">Coșul meu</h1>
<div>&nbsp;</div><div class="clearfix">&nbsp;</div>
<center>
  <div class="continut col-lg-9">  
    <h4 class="text-left">Produsele vândute de 
        <span class="paragrafC1">VanVanilla</span>    
        <span class="paragrafC2">Sweet</span>
         alese de către Dumneavoastră!
    </h4>
    <div class="produsAles col-md-8 text-left">
        <center>
                <?php
                    if(!empty($_SESSION['produseCos'])){
                        if(isset($_SESSION['produseCos'])){
                            $preturi = array();
                            $_SESSION['produse'] = array();
                            echo '<form action="includes/produsCos.inc.php" method="POST">';
                            foreach ($_SESSION['produseCos'] as $produse) {
                                $verificareProd = "SELECT * FROM produse where denumire_poza='".$produse."';";
                                $verificare_sqlProd = mysqli_query($conn,$verificareProd);
                                if (mysqli_num_rows($verificare_sqlProd) > 0) {
                                    while($row = mysqli_fetch_assoc($verificare_sqlProd)){
                                        if(!isset($_SESSION[$row["denumire_poza"]]) || $_SESSION[$row["denumire_poza"]] <= 0){
                                            $_SESSION[$row["denumire_poza"]] = 1;
                                        }
                                        array_push($_SESSION['produse'],$row["denumire_poza"]);
                                        echo '
                                        <div class="row">
                                            <div class="col-4">
                                                <center>
                                                    <img src="continut/produse/img_produse/'.$row["denumire_poza"].'" alt="ada">
                                                </center>
                                            </div>
                                            <div class="col produs">
                                                <label for="titlu" class="titlu">'.$row["titlu"].'</label><br>
                                                <label for="descriere" class="descriere">'.$row["descriere"].'</label><br>
                                                <label for="pret" class="pret">Pret: 
                                                    <span class="pret_produs1">'.$row["pret"].'</span>
                                                    <span class="pret_produs2">Ron</span>
                                                </label><br>
                                                <label for="'.$row["denumire_poza"].'" class="cantitate">Cantitate:</label>
                                                <input type="text" value="'.$_SESSION[$row["denumire_poza"]].'" id="'.$row["denumire_poza"].'" name="'.$row["denumire_poza"].'" size="2">
                                                <button type="submit" class="Increase" name="Increase" value="'.$row["denumire_poza"].'" ><i class="fas fa-sort-up"></i></button>
                                                <button type="submit" class="Descrease" name="Descrease" value="'.$row["denumire_poza"].'" ><i class="fas fa-sort-down"></i></button><br><br>
                                                <button type="submit" class="StergeProd" name="StergeProd" value="'.$row["denumire_poza"].'">Sterge produsul</button>
                                            </div>
                                        </div>
                                        ';
                                        array_push($preturi,$row["pret"]*$_SESSION[$row["denumire_poza"]]);
                                    }
                                }
                            }
                            echo '
                                <div>&nbsp;</div><div class="clearfix">&nbsp;</div>

                                <div class="row">
                                    <div class="col-4">
                                        <center>';
                            $_SESSION['pret_total']=0;          
                            foreach ($preturi as $suma){
                                $_SESSION['pret_total'] = $_SESSION['pret_total'] + $suma;
                            }
                            echo'           <p>Preț total: '.$_SESSION['pret_total'].' Ron</p>
                                        </center>
                                    </div>
                                    <div class="col produs">
                                        <button type="submit" class="continua" name="submitProd">Finalizează Comanda</button>
                                    </div>
                                </div>
                                <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
                            ';
                            echo '</form>';
                        }
                        $_SESSION['preturi'] = $preturi;
                    }else if(isset($_GET['checksts'])){
                            if($_GET['checksts']==1){
                                echo '<h4>Comanda a fost inregistrată cu succes. Vă rugam să asteptați ca un operator să vă contacteze!</h4>';
                            }
                        }   else {
                            echo '<h4>Nu exista produse in Cos!</h4>';
                        }
                ?>
            
        </center>
    </div>
    <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
  </div>
</center>

