<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Acceuil.css">
    <title>Buvette</title>
  </head>
  <body>
    
      <?php 
      require_once('Fonction.php');
      Navbar(); 
      ?>
	</body>
            
            <?php
            $st=null;
             if(isset($_POST['ch']));
              {
                $st=$_POST['ch'];
              }
            switch ($st) 
            {
              case '1':
                require_once ('Fonction.php');
              TopVolontaires();
                break;
              case '2':
                require_once ('Fonction.php');
              TopBuvette();
                break;
              case '3':
                $code=$_POST['code'];
            require_once ('Fonction.php');
            StatMatch($code);
                break;
            }
            ?>
        <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>

