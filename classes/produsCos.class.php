<?php

include_once "../includes/dbs.inc.php";
session_start();

class produsCos{
    private $produs;
    private $pozitie;
    public function __construct($produs){
        $this->produs = $produs;
    }
    public function adaugareProdusCos(){
        if(in_array($this->produs, $_SESSION['produseCos'])){
            header('Location: '.$_SERVER['HTTP_REFERER'].'?produsAdaug=probleme');  
            exit();
        } else{
            array_push($_SESSION['produseCos'],$this->produs);
            if(isset($_SERVER['HTTP_REFERER'])) {
                header('Location: '.$_SERVER['HTTP_REFERER'].'');
                exit;
               } else {
                header('Location: ../index.php?produsAdaug=probleme2');  
                exit();
               }
            exit();
        }
    }
    public function stergeProdusCos(){
        $this->pozitie = array_search($this->produs, $_SESSION['produseCos']);
        array_splice($_SESSION['produseCos'], $this->pozitie, 1);
        if(isset($_SERVER['HTTP_REFERER'])) {
            header('Location: '.$_SERVER['HTTP_REFERER'].'');
            exit;
           } else {
            header('Location: ../index.php?produsSters=probleme');  
           }
        exit();
    }
    public function increaseProdusCos(){
        
        if(isset($_SERVER['HTTP_REFERER'])) {
            $_SESSION[$this->produs] ++;
            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
           } else {
            header('Location: ../index.php?produsSters=probleme');  
           }
        exit();
    }
    public function descreaseProdusCos(){
        
        if(isset($_SERVER['HTTP_REFERER'])) {
            if($_SESSION[$this->produs] <= 1){
                $_SESSION[$this->produs] --;
                $produs = $this->produs;
                $cos = new produsCos($produs);
                $cos->StergeProdusCos();
            }
            $_SESSION[$this->produs] --;
            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
           } else {
            header('Location: ../index.php?produsSters=probleme');  
           }
        exit();
    }
    
}