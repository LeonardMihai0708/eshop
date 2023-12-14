<?php
  $count_r = "SELECT COUNT(*) FROM produse";
    $c_sql = mysqli_query($conn,$count_r);
    $c_sqlf = mysqli_fetch_assoc($c_sql);
    $max = $c_sqlf["COUNT(*)"];
    $randoLista = rand(1, $max);
    $verificare = "SELECT * FROM produse where id = $randoLista AND valabilitate='1';";
    $verificare_sql = mysqli_query($conn,$verificare);
    $ok = 1;
    while($ok==1){
        if(mysqli_num_rows($verificare_sql)!=0)
            while($row = mysqli_fetch_assoc($verificare_sql)){
                $ok = 0;
                echo '
                <div class="item" id="home" style="';

                echo"background: linear-gradient(-70deg, rgb(247, 247, 247) 40%, rgba(0, 0, 0, 0) 50%), url('continut/produse/img_produse/".$row['denumire_poza']."');";
                echo'">
                    <div class="parallaxBack"></div>
                    <img src="continut/produse/img_produse/'.$row['denumire_poza'].'" alt="">
                    <h1>'.$row['titlu'].'</h1>
                    <h2>'.$row['descriere'].'</h2>
                    <h3>'.$row['pret'].' Euro</h3>
                </div>
                ';
                echo'
                ';
        }
        else{
            $max = $c_sqlf["COUNT(*)"];
            $randoLista = rand(1, $max);
            $verificare = "SELECT * FROM produse where id = $randoLista AND valabilitate='1';";
            $verificare_sql = mysqli_query($conn,$verificare);
        }
    } 
?>