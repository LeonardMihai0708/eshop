
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href=index.php">
    <span class="paragraf1">VanVanilla</span>
    <span class="paragraf2">Sweet</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
      include_once "parti_navbar/search_si_pagini.php";
    ?>
    <ul class="navbar-nav text-right">
      <a href="checkoutProduse.php" class="shoppingCard"><i class="fas fa-shopping-cart"><?php
          if(isset($_SESSION['produseCos'])){
            $n = count($_SESSION['produseCos']);
          } else{ $n = 0;}
          echo '<p>'.$n.'</p>';
      ?></i></a>
      <?php
        if($_SESSION['stare']==1){
            include_once 'tip_stare/stare1.php';
        }
        else{
            include_once 'tip_stare/stare0.php';
        }
      ?>
      <li class="nav-item nav-item1">
        <form action="includes/delogare.inc.php" method="POST" onclick="return confirm('Esti sigur că dorești sa iesi din cont?');">
          <button type="submit" name="submit">Logout</button>
        </form>
      </li>
    </ul>
    
  </div>
</nav>