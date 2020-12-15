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
          <?php
          $st=null;
             if(isset($_POST['ch']));
              {
                $st=$_POST['ch'];
              }

          switch ($st) 
            {
              case 1:
                $nom=$_POST['nomV'];
                echo "<h2>Volontaire sélectionné</h2>";
                require_once ('Fonction.php');
                RechNom($nom);
                break;

              case 2:
                $agem=$_POST['agem'];
                $ageM=$_POST['ageM'];
                echo "<h2>Volontaires sélectionnés</h2>";
                require_once ('Fonction.php');
                RechAge($agem,$ageM);
                break;

              case 3:
                $Part=$_POST['part'];
                echo "<h2>Volontaires sélectionnés</h2>";
                require_once ('Fonction.php');                
                RechPart($Part);
                break;

              case 4:
                echo "<h2>Volontaires sélectionnés</h2>";
                $rech=$_POST['rech'];               
                require_once ('Fonction.php');
                if ($rech=='oui')
                {
                  RechRespO();
                }
                else
                {
                  RechRespN();
                }
                break;
            }
          ?>
          
        </body>
      <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>