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
    <h3>Choix des statistiques</h3>
      <div class="form">
       <form method=post action="" name="Rech">

        <select name="choix" onchange="this.form.submit()">
          <option value="0">Choisissez les statistiques à afficher</option>
          <option value="1">Top 5 des volontaires les plus présents.</option>
          <option value="2">Top 5 des plus grosses buvettes.</option>
          <option value="3">Buvettes ouvertes et Volontaires présents par matchs.</option>
        </select>

        
       </form>
       <?php 
          $choix=null;
          if(isset($_POST['choix']))
          {
            $choix=$_POST['choix'];
            Statistique($choix);
          }
        ?>
       </div>
	</body>
       <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>
