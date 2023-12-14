<?php

include_once "dbs.inc.php";
include "autoloader.php";
session_start();

if(isset($_POST['submit'])){
    $nume = mysqli_real_escape_string($conn,$_POST['nume']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $judet = mysqli_real_escape_string($conn,$_POST['judet']);
    $localitate = mysqli_real_escape_string($conn,$_POST['localitate']);
    $adresa =  mysqli_real_escape_string($conn,$_POST['adresa']);
    $pret_total = $_SESSION['pret_total'];
    $produse = $_SESSION['produse'];
    print_r($produse);echo "<br>";
    print_r($pret_total);
    echo "<br>";
    echo $nume;echo "<br>";
    echo $phone;echo "<br>";
    echo $email;echo "<br>";
    echo $judet;echo "<br>";
    echo $localitate;echo "<br>";
    echo $adresa;echo "<br>";
    $produseCantitate = "";
    $ok = 0;
    foreach ($_SESSION['produse'] as $produse){
        if($ok==0){
            $produseCantitate = $produse." ".$_SESSION[$produse];
            $ok++;
        } else {
            $produseCantitate = $produseCantitate." ".$produse." ".$_SESSION[$produse];
        }
        
        echo "&nbsp;";
    }
    $cos = new checkOut($nume,$phone,$email,$judet,$localitate,$adresa,$pret_total,$produseCantitate,$conn);
    $cos->checkOutFinal();
}

if(isset($_POST['submitProd'])){
    $_SESSION['checkout_status'] = 1;
    if(isset($_SERVER['HTTP_REFERER'])) {
        header('Location: '.$_SERVER['HTTP_REFERER'].'');
        exit;
    } else {
        header('Location: ../index.php?checkout=probleme');  
        exit();
    }
} else if(isset($_POST['StergeProd'])){
        $produs = $_POST['StergeProd'];
        $cos = new produsCos($produs);
        $cos->stergeProdusCos();
}
if(isset($_POST['backcheckout'])){
    $_SESSION['checkout_status'] = 0;
    if(isset($_SERVER['HTTP_REFERER'])) {
        header('Location: '.$_SERVER['HTTP_REFERER'].'');
        exit;
    } else {
        header('Location: ../index.php?produsAdaug=probleme2');  
        exit();
    }
}
if(isset($_POST['Increase'])){
    $produs = $_POST['Increase'];
    $cos = new produsCos($produs);
    $cos->increaseProdusCos();
}
if(isset($_POST['Descrease'])){
    $produs = $_POST['Descrease'];
    $cos = new produsCos($produs);
    $cos->descreaseProdusCos();
}
        