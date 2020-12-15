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
      
      <form method="post" name="ch">
<select name='choix' onchange="this.form.submit()">
    <option value="0">Choisir une option</option>

    <option value='1'>De choisir un match, une buvette et un volontaire pour affecter le volontaire comme responsable à la buvette au moment du match </option>

    <option value='2'>De choisir un match, une buvette et un volontaire pour affecter le membre comme volontaire à la buvette au moment du match</option>

    <option value='3'>De choisir un match et une buvette pour renseigner que la buvette est ouverte lors du match</option>

</select> 
</form>
<br>
  <?php 
    require_once('Fonction.php');
      $choix=null;
     if(isset($_POST['choix']))
        {
          $choix=$_POST['choix'];
          Affectation($choix);
        }
  ?>
  </body>
      <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>