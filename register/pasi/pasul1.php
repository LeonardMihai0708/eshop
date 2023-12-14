    <div class="col1 col-lg-3">
        <center>
            <div class="col-active col-lg-12">
                <p>
                &#x229A;  Pasul  1
                </p>
            </div>
            <hr>
            <div class="col col-lg-12">
                <p>
                &#x229A; Pasul  2
                </p>
            </div>
            <hr>
            <div class="col col-lg-12">
                <p>
                &#x229A; Pasul 3
                </p>
            </div>
        </center>
    </div>
    <div class="col2 col-md-8">
        <center>
            <h1>CREARE CONT</h1>
            <form action="includes/create_accountp1.php" method="POST">
                <?php
                    if(isset($_GET['probleme']))
                        switch ($_GET['probleme']) {
                            case "email":
                                echo 'Această adresă de email este folosită deja!</td>';
                                break;                  
                    }
                ?>
                <br>
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="email" placeholder="Email.." required>
                <br>
                <label for="Parola">Parola:</label>
                <input type="password" id="Parola" name="password" placeholder="Parola.." required><br><input type="checkbox" onclick="myFunction()">&nbsp;<p>Arată parola</p><br>
                <br>
                <button type="submit" name="submit">Pasul Următor</button>
            </form>
            <script>
            function myFunction() {
                var x = document.getElementById("Parola");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            </script>
        </center>
    </div>