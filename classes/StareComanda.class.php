<?php

include_once "../includes/dbs.inc.php";
session_start();

class stareComanda{
    private $conn;
    private $numar_comanda;
    private $stare;

    public function __construct($numar_comanda,$stare,$conn)
    {
        $this->conn = $conn;
        $this->numar_comanda = $numar_comanda;
        $this->stare = $stare;
    }

    public function schimb_Stare_Comanda(){
        $this->stare = "UPDATE comenzi SET stare = '".$this->stare."' WHERE id='".$this->numar_comanda."';";
        mysqli_query($this->conn,$this->stare);
        header('Location: ../comenzi.php?comenzi=succes');  
        exit();
    } 
}