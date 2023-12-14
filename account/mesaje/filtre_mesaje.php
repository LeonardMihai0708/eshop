<div class="filtre_comenzi col-md-12">
            <p>Filtre: </p>
            &nbsp;&nbsp;&nbsp;
            <form action="account/mesaje.php" method="POST" class="newsletter_conf">
                <select name="filtre_stare" id="filtre_stare">
                    <option value="def">Stare comandă</option>
                    <option value="1">Client contactat</option>
                    <option value="0">Client necontactat</option>
                </select>
                &nbsp;&nbsp;&nbsp;
                <input type="submit" value="Aplică Filtre" name="submit_filtre">
                &nbsp;&nbsp;&nbsp;
                
                <?php
                if(isset($_POST['submit_filtre']) && ($_POST['filtre_stare']!='def')){
                    echo '<input type="submit" value="Elimină Filtrele recente" name="eliminam_filtre">';
                }
                ?>
            </form>
        </div>
        <div>&nbsp;</div><div class="clearfix">&nbsp;</div>