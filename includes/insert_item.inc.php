<?php
session_start();
include_once "dbs.inc.php";
include "autoloader.php";


if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt)); // Sa il faca cu litere mici

    $allowed = array('jpg','jpeg', 'png', 'txt', 'pdf');

    $nume_produs = mysqli_real_escape_string($conn,$_POST['nume_produs']);
    $descriere_produs = mysqli_real_escape_string($conn,$_POST['descriere_produs']);
    $categorie = mysqli_real_escape_string($conn,$_POST['categorie']);
    $pret_produs = $_POST['pret_produs'];
    $item_insert = new insert_item($nume_produs, $descriere_produs , $categorie, $pret_produs, $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $conn);
    $item_insert->insert();
}else {
    exit();
}