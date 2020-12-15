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
    <body>
      <h3>Choix des critères de recherche</h3>
       <form method=post action="" name="Stat">

        <select name="choix" onchange="this.form.submit()">
          <option value="0">Choisissez un critère de recherche </option>
          <option value="1">Chercher par nom.</option>
          <option value="2">Chercher par tranche d'age.</option>
          <option value="3">Chercher par nombre minimumm de participation.</option>
          <option value="4">Chercher par responsables/non responsables de buvettes:</option>
        </select>

        
       </form>
        <?php 
          $choix=null;
          if(isset($_POST['choix']))
          {
            $choix=$_POST['choix'];
            Recherche($choix);
          }
        ?>
      </form>
    </body>
      <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>