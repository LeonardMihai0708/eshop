<?php

include_once "dbs.inc.php";
include "autoloader.php";
session_start();
if(isset($_POST['submit'])){
    if(isset($_POST['numar_mesaj'])){
        if ($_POST['numar_mesaj']!='nec') {
            if(isset($_POST['stare'])){
                if($_POST['stare']!='nec'){
                    $numar_comanda=$_POST['numar_mesaj'];
                    $stare = $_POST['stare'];
                    $comanda = new stareMesaj($numar_comanda, $stare, $conn);
                    $comanda->schimb_Stare_Mesaj();
                } else {
                    header('Location: ../account/mesaje.php?mesaj=stare_mesaj_nec');  
                    exit();
                }
            } else {
                header('Location: ../account/mesaje.php?mesaj=stare_mesaj_nec');  
                exit();
            }
        } else if(isset($_POST['numar_mesaj_var2'])){
                if ($_POST['numar_mesaj_var2']>0) {
                    if(isset($_POST['stare'])){
                        if ($_POST['stare']!='nec') {
                            $numar_comanda = $_POST['numar_mesaj_var2'];
                            if($numar_comanda <= $_SESSION['numar_mesaj_id']){
                                $stare = $_POST['stare'];
                                $comanda = new stareMesaj($numar_comanda, $stare, $conn);
                                $comanda->schimb_Stare_Mesaj();
                            } else {
                                header('Location: ../account/mesaje.php?mesaj=numar_mesaj_invalid');  
                                exit();
                            }
                        } else {
                            header('Location: ../account/mesaje.php?mesaj=stare_mesaj_nec');  
                            exit();
                        }
                    } else {
                        header('Location: ../account/mesaje.php?mesaj=stare_mesaj_nec');  
                        exit();
                    }
                } else {
                    header('Location: ../account/mesaje.php?mesaj=numar_mesaj_nec');  
                    exit();
                }
            } else{
                header('Location: ../account/mesaje.php?mesaj=numar_mesaj_nec');  
                exit();
            }
    }
}