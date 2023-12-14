<?php

include_once "../includes/dbs.inc.php";
session_start();

class checkOut{
    private $nume;
    private $phone;
    private $email;
    private $judet;
    private $localitate;
    private $adresa;
    private $pret_total;
    private $produseCantitate;
    private $conn;
    private $comanda;

    public function __construct($nume,$phone,$email,$judet,$localitate,$adresa,$pret_total,$produseCantitate,$conn){
        $this->nume = $nume;
        $this->phone = $phone;
        $this->email = $email;
        $this->judet = $judet;
        $this->localitate = $localitate;
        $this->adresa = $adresa;
        $this->pret_total = $pret_total;
        $this->produseCantitate = $produseCantitate;
        $this->conn = $conn;
    }
    public function checkOutFinal(){
        $this->comanda = "INSERT INTO comenzi (nume_prenume,telefon,email,judet,localitate,adresa,data_plasare,produse,pret_total,stare) 
        VALUES ('$this->nume','$this->phone','$this->email','$this->judet','$this->localitate','$this->adresa',current_timestamp(),'$this->produseCantitate','$this->pret_total','1');";
        mysqli_query($this->conn,$this->comanda);
        unset($_SESSION['produseCos']);
        if(isset($_SERVER['HTTP_REFERER'])) {
            header('Location: '.$_SERVER['HTTP_REFERER'].'?checksts=1');
            exit;
        } else {
            header('Location: ../index.php?produsAdaug=probleme2');  
            exit();
        }
    }
}