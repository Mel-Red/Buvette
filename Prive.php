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
			      <h3>Pour continuer, entrez vos identifiants administrateurs:</h3>  </br>

            <?php
            if (!empty($_POST['pass']) and $_POST['pass'] == "123") 
              {  
                header('Location: EspacePrive.php');
                exit();
              } 
            else 
              { 
                ?> 
                <form method="post" action="Prive.php">
                <label for=password class=form>Mot de passe :</label>  <input type=password name=pass required /> </br> </br>
                </form>
                <?php
              } 
                ?>
            
      <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>
      