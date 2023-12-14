<?php

include_once "../includes/dbs.inc.php";

class delete_item{

    
    private $conn;
    private $denumireAndExt;
    private $file;
    private $sql;

    public function __construct($denumireAndExt, $file, $conn)
    {
        $this->denumireAndExt = $denumireAndExt;
        $this->file = $file;
        $this->conn = $conn;
    }

    public function delete(){
        if(!unlink($this->file)){
            echo "File was not deleted!";
        } else{
            
            /*$this->sql = "DELETE FROM produse WHERE denumire_poza = '".$this->denumireAndExt."';";*/
            $this->sql = "UPDATE produse SET valabilitate='0' WHERE denumire_poza = '".$this->denumireAndExt."';";
            mysqli_query($this->conn,$this->sql);
            header("Location: ../account/add_item/addItem.php?deletesucces");
            exit();
        }
    }
        
}
