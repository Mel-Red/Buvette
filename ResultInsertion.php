<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Acceuil.css">
    <title>Buvette</title>
  </head>
  <body>
    
    <h1> <img src="Logo.jpg" height="100px" width="150px"> 
      Buvettes : l’application de gestion des buvettes du festival Sp’Or 
      <img src="fr.png" height="100px" width="150px" /> 
    </h1>
    <div class="navbar">

      <button class="button"><a href="Acceuil.php">Acceuil</a></button>

      <button class="button"><a href="Prive.php">Affectations</a></button>
      
      <button class="button"><a href="Recherchemembre.php">Recherche membres</a></button>
      
      <button class="button"><a href="Statistique.php">Statistiques</a></button>
      
      <button class="button"><a href="Insertion.php">Insertion</a></button>

      <button class="button"><a href="Confirmation.php">Confirmation</a></button>

    </div>
    

    
  </body>
			      <table border="1px;" align="center">
            <thead>
                <tr>
                    <td align="center">Date du match</td>
                    <td align="center">Equipe A</td>
                    <td align="center">Equipe B</td>
                </tr>
            </thead>
            <tbody>

            <?php 
              include_once('ConnexionBuvette.php'); 
              $sql = "SELECT * FROM Matchj";
              $sth = $dbh->query($sql); 
              $result = $sth->fetchAll(PDO::FETCH_ASSOC);
              $dbh=NULL; 
              foreach ($result as $row) 
              {
                echo '<tr>';
                echo '<td align="center">'.$row['dateM'].'</td>';
                echo '<td align="center">'.$row['eqA'].'</td>';
                echo '<td align="center">'.$row['eqB'].'</td>';
                echo '</tr>';
              }
            ?>
            </tbody>
      </table>
            <footer class="bas">
        Melvin Redureau
        Clément Dubuy de la Badonnière
      </footer>