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
        <form action="includes/produsCos.inc.php" method="POST">
            <button type="submit" name="backcheckout">Înapoi la produse</button>
        </form>
        <center>
            <h1>Date facturare</h1><br>
            <form action="includes/produsCos.inc.php" method="POST">
                <h4>Persoana de contact</h4>
                <label for="nume" >Nume:</label><br>
                <input type="text" id="nume" name="nume"
                <?php 
                    if(isset($_SESSION['nume_prenume']) && $_SESSION){
                        echo 'value="'.$_SESSION['nume_prenume'].'"';
                    } else {
                        echo 'placeholder="Nume si Prenume"';
                    }
                ?>required><br><br>

                <label for="phone">Telefon:</label><br>
                <input type="tel" id="phone" name="phone"
                pattern="[0]{1}[1-9]{1}[0-9]{8}"
                <?php 
                    if(isset($_SESSION['nume_prenume']) && $_SESSION){
                        echo 'value="'.$_SESSION['telefon'].'"';
                    } else {
                        echo 'placeholder="Telefon"';
                    }
                ?>
                required><br><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"
                <?php 
                    if(isset($_SESSION['nume_prenume']) && $_SESSION){
                        echo 'value="'.$_SESSION['email'].'"';
                    } else {
                        echo 'placeholder="Email"';
                    }
                ?>required><br><br><br>

                <h4>Adresa de facturare</h4>
                
                <label for="judet">Județ:</label>
                <select id="judet" name="judet">
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
                </select required><br>
                <label for="localitate" >Localitate:</label><br>
                <input type="text" id="localitate" name="localitate" required><br>
                <label for="adresa" >Adresa:</label><br>
                <input type="text" id="adresa" name="adresa" required><br><br><br>

                <div class="row">
                    <div class="col">
                        <p>Pret total: <?php echo $_SESSION['pret_total']; ?></p>
                    </div>
                    <div class="col">
                        <input type="submit" value="Submit" name="submit">
                    </div>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" name="checkbox" required>
                        <a href="info.php" target="_blank">Termenii si Condițiile.</a>    
                    </label>
                </div>
                <br><br>
                <h4>Modalitate de plata</h4>
                <p>Un operator vă va contacta in cel mai scurt timp pentru a stabili modalitatea de plata si data la care va ajunge comanda la dumneavoastră.</p><br>
            </form> 
        </center>
    </div>
    <div>&nbsp;</div><div class="clearfix">&nbsp;</div>
  </div>
</center>
