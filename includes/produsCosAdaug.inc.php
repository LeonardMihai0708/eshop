<?php

include_once "dbs.inc.php";
include "autoloader.php";


if(isset($_GET['ext'])){
    $produs = $_GET['ext'];
    $cos = new produsCos($produs);
    $cos->adaugareProdusCos();
}else {
    exit();
}