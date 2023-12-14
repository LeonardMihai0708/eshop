<?php

include_once "../includes/dbs.inc.php";
session_start();

class updatePassword{

    private $conn;
    private $parola_curenta;
    private $parola_curentaRedo;
    private $parola_noua;
    private $verificare;
    private $email;
    private $hashedPwdInDB;
    private $hashedPwdInUSR;
    private $SQLhashedPwdInDB;
    private $REZhashedPwdInDB;

    public function __construct($conn,$parola_curenta, $parola_curentaRedo,$parola_noua)
    {
        $this->parola_curenta = $parola_curenta;
        $this->parola_curentaRedo = $parola_curentaRedo;
        $this->parola_noua = $parola_noua;
        $this->conn = $conn;
        $this->email = $_SESSION['email'];
    }

    public function updPsw(){
        if($this->parola_curenta == $this->parola_curentaRedo){
            if($this->parola_curenta != $this->parola_noua){
                $this->SQLhashedPwdInDB = "Select password from conturi where email='$this->email'";
                $this->REZhashedPwdInDB = mysqli_query($this->conn,$this->SQLhashedPwdInDB);
                $this->hashedPwdInDB = mysqli_fetch_assoc($this->REZhashedPwdInDB);
                if(password_verify($this->parola_curenta, $this->hashedPwdInDB['password']) == 1){
                    $this->parola_noua = password_hash($this->parola_noua, PASSWORD_DEFAULT);
                    $this->sql = "
                    UPDATE conturi 
                    SET password= '".$this->parola_noua."' 
                    WHERE password = '".$this->hashedPwdInDB['password']."'";

                    mysqli_query($this->conn,$this->sql);
                    echo 'parola a fost schimbata';
                    header('Location: ../account/account.php?parola_schimb=succes');  
                    exit();
                } else {
                    echo 'parola incorecta';
                    header('Location: ../account/account.php?parola_schimb=incorect');  
                    exit();
                }
            } else{
                echo 'parolele coincid';
                header('Location: ../account/account.php?parola_schimb=succes');  
                exit();
            }
        } else{
            echo'parolele nu coincid';
            header('Location: ../account/account.php?parola_schimb=nucoincid');  
            exit();
        }
    }
        
}
