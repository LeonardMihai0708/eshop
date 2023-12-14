<?php

include_once "dbs.inc.php";
include "autoloader.php";


if(isset($_POST['submit_email']) ){
    $parola_curenta = $_POST['parola_curenta'];
    $parola_curentaRedo = $_POST['parola_curentaRedo'];
    $parola_noua = $_POST['parola_noua'];
    $cos = new updatePassword($conn,$parola_curenta,$parola_curentaRedo,$parola_noua);
    $cos->updPsw();
}else {
    exit();
}