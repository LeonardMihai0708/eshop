<?php
session_start();
include_once "dbs.inc.php";
include "autoloader.php";


if(isset($_POST['submit'])){
    $sessionname = $_POST['produs'];
    $sessionnameEXP = explode(" ",$sessionname);
    $denumireFull = "";
    foreach ($sessionnameEXP as $denumire) {
        $denumireFull = $denumireFull.$denumire;
    }
    $filename = "../continut/produse/img_produse/".$denumireFull."*";
    $fileinfo = glob($filename);
    $extensions = array('jpg','jpeg', 'png', 'txt', 'pdf');
    for ($i = 0; $i<5; $i++){
        if(strpos($fileinfo[0], $extensions[$i]) !== false){
            $fileactualext = $extensions[$i];
            break;
        }
    }
    $file = "../continut/produse/img_produse/".$denumireFull.".".$fileactualext;
    $denumireAndExt = $denumireFull.".".$fileactualext;
    $item_insert = new delete_item($denumireAndExt, $file, $conn);
    $item_insert->delete();
}else {
    exit();
}