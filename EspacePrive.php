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
      <p>Dans cette page, vous allez pouvoir insérer un volontaire, une buvette ou un match dans la base de donnée.</p>

      <form name="ch" method="post">
        <select name="choix" onchange="this.form.submit()">
          <option value="0"> Choisissez ce que vous souhaitez faire </option>
          <option value="1"> Ajouter un volontaire </option>
          <option value="2"> Ajouter une buvette </option>
          <option value="3"> Ajouter un match </option>
        </select>
      <?php 
 # require_once('Fonction.php');
      $choix=null;
     if(isset($_POST['choix']))
        {
          $choix=$_POST['choix'];
        #Insertion($choix);
        #}
        #function insertion($choix)
#{
  
  switch ($choix) 
  { 
    case 1:
      echo "<h2>Ajout d'un volontaire à la base de donnée.</h2><br>";
      echo "<form name=Insertion method=post action=Insertion.php>";
      echo "<label for=nomV>Veuillez entrer le nom du volontaire:</label><input type=text name=nomV Id=nomV placeholder='Ex:Martin Dupont' maxlenght=35 size=35 required><br>";
      echo "<label for=age>Veuillez entrer l'age du volontaire</label><input type=text name=age Id=age><br>";
      echo "<input type=reset value=Recommencer> <input type=submit value=Envoyer>";
      echo "</form>";
      break;
    
    case 2:

      echo "<h2>Ajout d'une buvette à la base de donnée.</h2><br>"; 
      echo "<form name=Insertion method=post action=Insertion.php>";
      echo "<label for=nomB>Veuillez entrer le nom de la buvette</label><input type=text name=nomB Id=nomB placeholder='Frites et Churos' maxlenght=35 size=35 require><br>";
      echo "<label for=EmpBuv>Veuillez entrer l'emplacement de la buvette</label><input type=text name=EmpBuv Id=EmpBuv placeholder='Ex: Place des Fêtes' maxlenght=35 size=35><br>";
      echo "<label for=Resp>Veuillez entrer l'Id du volontaire qui en sera responsable</label><input type=text name=Resp Id=Resp><br>";
      echo "<input type=reset value=Recommencer> <input type=submit value=Envoyer>";
      echo "</form>";
      break;
  }
  }
      ?>
      </form>
      <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>