<?php
include_once "dbs.inc.php";
include "autoloader.php";
session_start();

if(isset($_POST['submit'])){
    $subiect = $_POST['subiect'];
    $mesaj = $_POST['mesaj'];
    $nume_prenume = $_POST['nume']." ".$_POST['prenume'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $msg = new mesaj($nume_prenume,$email,$telefon,$mesaj,$subiect,$conn);
    $msg->msg();
}else {
    exit();
}