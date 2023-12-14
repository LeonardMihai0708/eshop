<?php

include_once "dbs.inc.php";
include "autoloader.php";


if(isset($_POST['submit'])){
    $register = new create_accountp3($conn);
    $register->createp3();
}else {
    exit();
}