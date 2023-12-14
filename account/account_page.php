<div>&nbsp;</div><div class="clearfix">&nbsp;</div>

<div class="container col-lg-11">
    <?php
    if(isset($_GET['parola_schimb'])){
        switch ($_GET['parola_schimb']) {
            case 'incorect':
                echo '<center><h3>Parola actuală este gresită!</h3></center>';
                break;
            case 'nucoincid':
                echo '<center><h3>Parolele din prima respectiv a doua căsuță nu sunt asemănătoare!</h3></center>';
                break;
            case 'succes':
                echo '<center><h3>Parola a fost actualizată cu succes!</h3></center>';
                break;
            
            default:
                echo 'Bine ai venit '.$_SESSION['nume_prenume'].'!';
                break;
        }
    } else {
        echo 'Bine ai venit '.$_SESSION['nume_prenume'].'!';
    }
    ?>
    <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
    <div class="email_conf">
        <h6>Adresa dumneavoastră:</h6>
        <p>
            <?php echo $_SESSION['email']; ?>
        </p>
    </div>
    <?php
    switch (isset($_POST['verif'])) {
        case 1:
            echo '
            <h6>V-ati dezabonat de la newsletter!</h6>
            ';
            break;
        case 2:
            echo '
            <h6>V-ati abonat cu succes la newsletter!</h6>
            ';
            break;
    }
    if(isset($_POST['prob'])==1) {
        echo '
        <h6>A aparut o eroare la server, vă rugăm să mai incercați încă o data!</h6>
        ';
    }
    include_once "../includes/dbs.inc.php";
    $news_conn = "SELECT * FROM newsletter where email = '".$_SESSION['email']."'";
    $news_conn_ver = mysqli_query($conn,$news_conn);
    $news_conn_tab = mysqli_fetch_assoc($news_conn_ver);
    if($news_conn_tab == NULL){
        echo'
        <form action="includes/newsletter_add.php" method="POST" class="newsletter_conf col-md-12">
            <i class="fas fa-envelope"></i><p>&nbsp;&nbsp;Newsletter</p><br>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="1" name="checkbox2" required>
                    <h6>Doriți să primiți mesaje legate despre noile promoții sau produse adăugate recent în stoc.</h6>
                </label>
            </div>
            <button type="submit" name="submit_1" class="btn btn-primary">Vreau să ma abonez la newsletter!</button>
        </form>
        <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
        ';
    } else{
        echo '
        
        <form action="includes/newsletter_delete.php" method="POST" class="newsletter_conf col-md-12">
            <i class="fas fa-envelope"></i><p>&nbsp;&nbsp;Newsletter</p><br>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="1" name="checkbox3" required>
                    <h6>Doriti să vă dezabonați de la newsletter?</h6>
                </label>
            </div>
            <button type="submit" name="submit_2" class="btn btn-primary btn_2">Nu doresc să mai fiu la curent cu ultimile noutăți și oferte</button>
        </form>
        <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
        <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
        
        ';
    }

    ?>
    <form action="includes/resetareParola.inc.php" method="POST" class="psw_conf col-md-12">
        <i class="fas fa-unlock-alt"></i><h4>&nbsp;&nbsp;Schimbare Parolă:</h4><br>
        <input type="password" name="parola_curenta" placeholder="Parola curentă" id="psw1" required><input type="checkbox" onclick="myFunction1()"><p>Arată parola</p><br>
        <input type="password" name="parola_curentaRedo" placeholder="Introduceți din nou parola" id="psw2" required><input type="checkbox" onclick="myFunction2()"><p>Arată parola</p><br>
        <input type="password" name="parola_noua" placeholder="Parola nouă" id="psw3" required><input type="checkbox" onclick="myFunction3()"><p>Arată parola</p><br>
        <button type="submit" name="submit_email" class="btn btn-primary">Salvează</button>
        <script src="account/js/psw.js"></script>
    </form>
</div>

<div>&nbsp;</div><div class="clearfix">&nbsp;</div>

<?php
  include_once "copyright.php";
?>
<?php
  include_once "../cookies.php";
?>