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
      
      <form method="post" action="" name="fch">
<select name='choix' onchange="this.form.submit()">
    <option value="0">Choisir une option</option>

    <option value='1'>De choisir un match, une buvette et un volontaire pour affecter le volontaire comme responsable à la buvette au moment du match </option>

    <option value='2'>De choisir un match, une buvette et un volontaire pour affecter le membre comme volontaire à la buvette au moment du match</option>

    <option value='3'>De choisir un match et une buvette pour renseigner que la buvette est ouverte lors du match</option>

</select> 
</form>
<br>
  <?php 
  require_once('ConnexionBuvette.php');
      $choix=null;
     if(isset($_POST['choix']))
        {
          $choix=$_POST['choix'];
        Affectations($choix);
        }

function Affectations($choix)
{       
        
  switch ($choix) 
  {
    case '1':
        echo "<p>Formulaire d'affectation de responsable:";
        echo "Choisissez un match:<br>";
        echo "<form name=test method=post action=>";
        echo "<select name=choix1 onchange=this.form.submit()>";
        echo "<option value=0>Choisissez</option>"; 
        $dbh=Connection();
        $sql="SELECT * from matchj";
        $sth=$dbh->query($sql);
        while ($donnee=$sth->fetch()) 
        {
        ?>
          <option value="<?php echo $donnee['idM']; ?>"><?php echo $donnee['eqA'];?> vs <?php echo $donnee['eqB']; ?></option>
          <?php 
        }
          ?>
        </select>
        </form>
        <?php
          $choix1=null;     
          if(isset($_POST['choix1']))
          {
            $choix1=$_POST['choix1'];
            AffecterResponsable($choix1);
          }

    break;
    
    case '2':
       echo "EN CONSTRUCTION";
    break;
  }
}



function AffecterResponsable($choix1)
{
      $dbh=Connection();
      echo "Choix1=".$choix1;
      echo"<table border=1px align=center>";
      echo"<thead>";
      echo"    <tr>";
      echo"        <td align=center>Id Match</td>";
      echo"        <td align=center>Id volontaire</td>";
      echo"        <td align=center>Nom Volontaire</td>";
      echo"        <td align=center>Id buvette</td>";
      echo"        <td align=center>Id responsable actuel de la buvette</td>";
      echo"    </tr>";
      echo"</thead>";
     
      $sql = "SELECT idM, estpresent.idV as IdVol, nomV, estpresent.idB as IdBuv, responsable from estpresent, buvette, volontaire where estpresent.idV=volontaire.idV and estpresent.idB=buvette.idB and idM='$choix1' order by estpresent.idB;";
      $sth = $dbh->query($sql); 
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      $dbh=NULL; 
      foreach ($result as $row) 
       {
         echo '<tr>';
         echo '<td align="center">'.$row['idM'].'</td>';
         echo '<td align="center">'.$row['IdVol'].'</td>';
         echo '<td align="center">'.$row['nomV'].'</td>';
         echo '<td align="center">'.$row['IdBuv'].'</td>';
         echo '<td align="center">'.$row['responsable'].'</td>';
         echo '</tr>';
       } 
}
?>
  </body>
      <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>