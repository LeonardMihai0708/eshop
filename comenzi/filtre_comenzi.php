<div class="filtre_comenzi col-md-12">
            <p>Filtre: </p>
            &nbsp;&nbsp;&nbsp;
            <form action="comenzi.php" method="POST" class="newsletter_conf">
                <select name="filtre_stare" id="filtre_stare">
                    <option value="def">Stare comandă</option>
                    <option value="1">Comanda Plasată</option>
                    <option value="2">Client Contactat</option>
                    <option value="3">Comanda în livrare</option>
                    <option value="0">Comanda Finalizată</option>
                </select>
                &nbsp;&nbsp;&nbsp;
                <select name="filtre_judet" id="filtre_stare">
                    <option value="def">Județul comenzii</option>
                    <option value="Bucureşti">Bucureşti</option>
                    <option value="Alba">Alba</option>
                    <option value="Arad">Arad</option>
                    <option value="Arges">Arges</option>
                    <option value="Bacău">Bacău</option>
                    <option value="Bihor">Bihor</option>
                    <option value="Bistriţa-Năsăud">Bistriţa-Năsăud</option>
                    <option value="Botoşani">Botoşani</option>
                    <option value="Braşov">Braşov</option>
                    <option value="Brăila">Brăila</option>
                    <option value="Buzău">Buzău</option>
                    <option value="Caraş-Severin">Caraş-Severin</option>
                    <option value="Călăraşi">Călăraşi</option>
                    <option value="Cluj">Cluj</option>
                    <option value="Constanţa">Constanţa</option>
                    <option value="Covasna">Covasna</option>
                    <option value="Dâmboviţa">Dâmboviţa</option>
                    <option value="Dolj">Dolj</option>
                    <option value="Galaţi">Galaţi</option>
                    <option value="Giurgiu">Giurgiu</option>
                    <option value="Gorj">Gorj</option>
                    <option value="Harghita">Harghita</option>
                    <option value="Hunedoara">Hunedoara</option>
                    <option value="Ialomiţa">Ialomiţa</option>
                    <option value="Iaşi">Iaşi</option>
                    <option value="Ilfov">Ilfov</option>
                    <option value="Maramureş">Maramureş</option>
                    <option value="Mehedinţi">Mehedinţi</option>
                    <option value="Mureş">Mureş</option>
                    <option value="Neamţ">Neamţ</option>
                    <option value="Olt">Olt</option>
                    <option value="Prahova">Prahova</option>
                    <option value="Satu Mare">Satu Mare</option>
                    <option value="Sălaj">Sălaj</option>
                    <option value="Sibiu">Sibiu</option>
                    <option value="Suceava">Suceava</option>
                    <option value="Teleorman">Teleorman</option>
                    <option value="Timiş">Timiş</option>
                    <option value="Tulcea">Tulcea</option>
                    <option value="Vâlcea">Vâlcea</option>
                    <option value="Vaslui">Vaslui</option>
                    <option value="Vrancea">Vrancea</option>
                </select>
                &nbsp;&nbsp;&nbsp;
                <input type="submit" value="Aplică Filtre" name="submit_filtre">
                &nbsp;&nbsp;&nbsp;
                
                <?php
                if(isset($_POST['submit_filtre']) && ($_POST['filtre_stare']!='def' || $_POST['filtre_judet'] != 'def')){
                    echo '<input type="submit" value="Elimină Filtrele recente" name="eliminam_filtre">';
                }
                ?>
            </form>
        </div>
        <div>&nbsp;</div><div class="clearfix">&nbsp;</div>