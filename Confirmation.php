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
             if(isset($_POST['choix']));
              {
                $st=$_POST['choix'];
              }
  ?>
            <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>