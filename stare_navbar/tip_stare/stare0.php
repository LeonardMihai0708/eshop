<?php

echo '
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    '.$_SESSION['nume_prenume'].'
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <center>';
if (stripos($_SERVER['REQUEST_URI'], 'account.php')){
    echo '
    <a class="dropdown-item" href="index.php">Pagina Principală</a>
    ';
} else if(stripos($_SERVER['REQUEST_URI'], 'contact.php')){
    echo '
    <a class="dropdown-item" href="account/account.php">Contul Meu</a>
    '; 
} else{
    echo '
    <a class="dropdown-item" href="account/account.php">Contul Meu</a>
    '; 
}
echo'
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="account/mesaje.php">Mesaje</a>
    <a class="dropdown-item" href="comenzi.php">Comenzile Mele</a>
    </center>
</div>
</li>
';

?>