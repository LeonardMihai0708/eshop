<?php

include_once "../includes/dbs.inc.php";
session_start();

class create_accountp2{

    private $nume_prenume;
    private $data_nasterii;
    private $telefon;
    private $conn;
    private $verificare;
    private $verificare_sql;
    private $verificare_sql_TAB;
    private $verificare_tel;
    private $verificare_tel_sql;

    public function __construct($nume_prenume, $data_nasterii, $telefon, $conn)
    {
        $this->nume_prenume = $nume_prenume;
        $this->data_nasterii = $data_nasterii;
        $this->telefon = $telefon;
        $this->conn = $conn;
    }

    public function createp2(){
        $_SESSION['nume_prenume_cont_nou'] = $this->nume_prenume;
        $_SESSION['data_nasterii'] = $this->data_nasterii;
        $_SESSION['telefon'] = $this->telefon;
        $this->verificare_tel = "SELECT telefon FROM conturi WHERE telefon='".$this->telefon."';";
        $this->verificare_tel_sql = mysqli_query($this->conn,$this->verificare_tel);
        $this->verificare_final = mysqli_fetch_assoc($this->verificare_tel_sql);
        if($this->verificare_final == NULL){
            $_SESSION['verificare2'] = 'pasul2_verificat';
            header('Location: ../register/register.php?pas=3'); 
            exit();
        } else {
            header('Location: ../register/register.php?pas=2&probleme=telefon'); 
        }
        
    }
        
}
