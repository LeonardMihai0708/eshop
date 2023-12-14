<?php

include_once "dbs.inc.php";
include "autoloader.php";
session_start();
if(isset($_POST['submit'])){
    if(isset($_POST['numar_comanda'])){
        if ($_POST['numar_comanda']!='nec') {
            if(isset($_POST['stare'])){
                if($_POST['stare']!='nec'){
                    $numar_comanda=$_POST['numar_comanda'];
                    $stare = $_POST['stare'];
                    $comanda = new stareComanda($numar_comanda, $stare, $conn);
                    $comanda->schimb_Stare_Comanda();
                } else {
                    header('Location: ../comenzi.php?comenzi=stare_comanda_nec');  
                    exit();
                }
            } else {
                header('Location: ../comenzi.php?comenzi=stare_comanda_nec');  
                exit();
            }
        } else if(isset($_POST['numar_comanda_var2'])){
                if ($_POST['numar_comanda_var2']>0) {
                    if(isset($_POST['stare'])){
                        if ($_POST['stare']!='nec') {
                            $numar_comanda = $_POST['numar_comanda_var2'];
                            if($numar_comanda <= $_SESSION['numar_comenzi_id']){
                                $stare = $_POST['stare'];
                                $comanda = new stareComanda($numar_comanda, $stare, $conn);
                                $comanda->schimb_Stare_Comanda();
                            } else {
                                header('Location: ../comenzi.php?comenzi=numar_comanda_invalid');  
                                exit();
                            }
                        } else {
                            header('Location: ../comenzi.php?comenzi=stare_comanda_nec');  
                            exit();
                        }
                    } else {
                        header('Location: ../comenzi.php?comenzi=stare_comanda_nec');  
                        exit();
                    }
                } else {
                    header('Location: ../comenzi.php?comenzi=numar_comanda_invalid');  
                    exit();
                }
            } else{
                header('Location: ../comenzi.php?comenzi=numar_comanda_nec');  
                exit();
            }
    }
}