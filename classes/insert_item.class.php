<?php

include_once "../includes/dbs.inc.php";

class insert_item{

    private $nume_produs;
    private $descriere_produs;
    private $pret_produs;
    private $categorie;
    private $file;
    private $fileName;
    private $fileTmpName;
    private $fileSize;
    private $fileError;
    private $fileType;
    private $conn;
    private $count_products_SQL;
    private $count_products;
    private $count_products_FINAL;
    private $id;
    private $fileExt, $fileActualExt, $allowed;
    private $itemsSQL, $denumire, $denumire_full;
    
    public function __construct($nume_produs, $descriere_produs, $categorie, $pret_produs, $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $conn)
    {
        $this->nume_produs = $nume_produs;
        $this->descriere_produs = $descriere_produs;
        $this->pret_produs = $pret_produs;
        $this->categorie = $categorie;
        $this->file = $file;
        $this->fileName = $fileName;
        $this->fileTmpName = $fileTmpName;
        $this->fileSize = $fileSize;
        $this->fileError = $fileError;
        $this->fileType = $fileType;
        $this->fileExt = $fileExt;
        $this->fileActualExt = $fileActualExt;
        $this->allowed = $allowed;
        $this->conn = $conn;
    }

    public function insert(){
        $this->count_products_SQL = "SELECT COUNT(id) FROM produse;";
        $this->count_products = mysqli_query($this->conn,$this->count_products_SQL);
        $this->count_products_FINAL = mysqli_fetch_assoc($this->count_products);
        $this->id = $this->count_products_FINAL["COUNT(id)"]+1;
        $this->denumire = explode(" ",$this->nume_produs);
        foreach ($this->denumire as $index) {
            $this->denumire_full = $this->denumire_full.$index;
        }
        if (in_array($this->fileActualExt,$this->allowed)) {
            if ($this->fileError === 0) { // daca nu exista erori in fisierul pus
                if($this->fileSize < 10000000){
                    $this->fileNameNew = $this->denumire_full.".".$this->fileActualExt;
                    $this->fileDestination = '../continut/produse/img_produse/'.$this->fileNameNew;
                    move_uploaded_file($this->fileTmpName, $this->fileDestination);
                    $this->itemsSQL = 'INSERT INTO produse (titlu,descriere, categorie,pret,valabilitate, denumire_poza) VALUES ("'.$this->nume_produs.'","'.$this->descriere_produs.'","'.$this->categorie.'","'.$this->pret_produs.'","1","'.$this->fileNameNew.'");';
                    mysqli_query($this->conn,$this->itemsSQL);
                    header("Location: ../account/add_item/addItem.php?uploadsuccess");
                } else{
                    echo "Your file is too big!";
                }
            } else{
                echo "There was an error uploading your file!";
            }
        } else{
            echo "You cannot upload files of this type!";
        }
    }
        
}
