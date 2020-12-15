<?php 
require_once('ConnexionBuvette.php');



function Navbar()
{
      echo '<h1> <img src="img/Logo.jpg" height="100px" width="150px">'; 

      echo 'Buvettes : l’application de gestion des buvettes du festival Sp’Or'; 

      echo '<img src="img/fr.png" height="100px" width="150px" />'; 
      
      echo '</h1>';

      echo '<div class="navbar">';

      echo '<button class="button"><a href="Accueil.php">Nouveautés</a></button>';

      echo '<button class="button"><a href="Statistique.php">Statistiques</a></button>';

      echo '<button class="button"><a href="Recherchemembre.php">Recherche membres</a></button>';

      echo '<button class="button"><a href="Affectation.php">Affectations</a></button>';
      
      echo '<button class="button"><a href="Prive.php">Administrateur</a></button>';

      echo '</div>';
}




function TopVolontaires()
{
              $dbh = Connection();
			        echo "<div>";
              echo '<h2 align=center>Les 5 volontaires les plus présents (en nombre de matchs)</h2>';
              echo "<table border=1px align=center>";
              echo"<thead>";
              echo  "<tr>";
              echo    "<td align=center>Id Volontaires</td>";
              echo    "<td align=center>Nom volontaire</td>";
              echo     "<td align=center>Age volontaire</td>";
              echo    "<td align=center>Nombre de présences (en matchs)</td>";
              echo  "</tr>";
              echo "</thead>";

           	  echo	"</div>";

 
              $sql = "SELECT volontaire.idV, nomV, age, count(distinct idM) as VolLesPlusPresent from estpresent, volontaire where volontaire.idV=estpresent.idV group by estpresent.idV order by VolLesPlusPresent desc limit 5;";
              $sth = $dbh->query($sql); 
              $result = $sth->fetchAll(PDO::FETCH_ASSOC);
              $dbh=NULL;
              foreach ($result as $row) 
              {
                echo '<tr>';
                echo '<td align="center">'.$row['idV'].'</td>';
                echo '<td align="center">'.$row['nomV'].'</td>';
                echo '<td align="center">'.$row['age'].'</td>';
                echo '<td align="center">'.$row['VolLesPlusPresent'].'</td>';
                echo '</tr>';
              }
                echo "</table>";
}


function TopBuvette()
{
              $dbh = Connection(); 
              echo "<div>";
              echo '<h2 align=center>Les 5 buvettes ayant mobilisées le plus de volontaires</h2>';
              echo "<table border=1px align=center>";
              echo"<thead>";
              echo  "<tr>";
              echo    "<td align=center>Id Buvette</td>";
              echo    "<td align=center>Nom Buvette</td>";
              echo    "<td align=center> Emplacement Buvette</td>";
              echo    "<td align=center> Nombre total de volontaires</td>";
              echo  "</tr>";
              echo "</thead>";

           	  echo	"</div>";
              $sql = "SELECT buvette.idB, count(distinct idV) as lePlusDeVol, nomB,emplacement from buvette, estpresent where buvette.idB=estpresent.idB group by estpresent.idB order by count(distinct idV) desc limit 5;";
              $sth = $dbh->query($sql); 
              $result = $sth->fetchAll(PDO::FETCH_ASSOC);
              $dbh=NULL; 
              foreach ($result as $row) 
              {
                echo '<tr>';
                echo '<td align="center">'.$row['idB'].'</td>';
                echo '<td align="center">'.$row['nomB'].'</td>';
                echo '<td align="center">'.$row['emplacement'].'</td>';
                echo '<td align="center">'.$row['lePlusDeVol'].'</td>';
                echo '</tr>';

              }
}


function StatMatch($code)
{
              $dbh = Connection(); 
              echo "<div>";
              echo '<h2 align=center>Buvette ouvertes et volontaire présents durant le match n°'.$code.'</h2>';
              echo "<table border=1px align=center>";
              echo"<thead>";
              echo  "<tr>";
              echo    "<td align=center>Nom Buvette</td>";
              echo    "<td align=center>Emplacement Buvette</td>";
              echo    "<td align=center>Responsable</td>";
              echo    "<td align=center>Nom du volontaire</td>";
              echo    "<td align=center>Age du volontaire</td>";
              echo    "<td align=center>Heure de début</td>";
              echo    "<td align=center>Heure de fin</td>";
              echo  "</tr>";
              echo "</thead>";

           	  echo	"</div>";
              $sql = "SELECT nomB,emplacement,responsable,nomV,age,hdeb,hfin FROM Buvette b,Volontaire v,EstPresent e,EstOuverte o WHERE e.idV=v.idV AND e.idB=b.idB AND b.idB=o.idB AND o.idM=e.idM AND e.idM=$code";
              $sth = $dbh->query($sql); 
              $result = $sth->fetchAll(PDO::FETCH_ASSOC);
              $dbh=NULL; 
              foreach ($result as $row) 
              {
                echo '<tr>';
                echo '<td align="center">'.$row['nomB'].'</td>';
                echo '<td align="center">'.$row['emplacement'].'</td>';
                echo '<td align="center">'.$row['responsable'].'</td>';
                echo '<td align="center">'.$row['nomV'].'</td>';
				echo '<td align="center">'.$row['age'].'</td>';
				echo '<td align="center">'.$row['hdeb'].'</td>';
				echo '<td align="center">'.$row['hfin'].'</td>';
                echo '</tr>';

              }
}

					


function AfficheMatch()
{
$dbh = Connection();
            echo "<h2 align=center>Tableau des matchs</h2>"; 
           	echo"<table border=1px align=center>";
            echo"<thead>";
            echo"    <tr>";
            echo"        <td align=center>Date du match</td>";
            echo"        <td align=center>Equipe A</td>";
            echo"        <td align=center>Equipe B</td>";
            echo"        <td align=center>Points équipe A</td>";
            echo"        <td align=center>Points équipe B</td>";
            echo"        <td align=center>Code du match</td>";
            echo"        <td align=center>Nombre de buvettes ouvertes</td>";
            echo"        <td align=center>Nombre de volontaires présents</td>";
            echo"    </tr>";
            echo"</thead>";
              $sql = "SELECT Matchj.idM, dateM, eqA, eqB, scoreA, scoreB, count(distinct idB) AS NbBuvOuv, count(distinct idV) AS NbVolPres FROM Matchj, estpresent WHERE Matchj.idM=estpresent.idM GROUP BY estpresent.idM";
              $sth = $dbh->query($sql); 
              $result = $sth->fetchAll(PDO::FETCH_ASSOC);
              $dbh=NULL; 
              foreach ($result as $row) 
              {
                echo '<tr>';
                echo '<td align="center">'.$row['dateM'].'</td>';
                echo '<td align="center">'.$row['eqA'].'</td>';
                #echo .....................$row['drapeauA']
                echo '<td align="center">'.$row['eqB'].'</td>';
                #echo .....................
                echo '<td align="center">'.$row['scoreA'].'</td>';
                echo '<td align="center">'.$row['scoreB'].'</td>';
                echo '<td align="center">'.$row['idM'].'</td>';
                echo '<td align="center">'.$row['NbBuvOuv'].'</td>';
                echo '<td align="center">'.$row['NbVolPres'].'</td>';
                echo '</tr>';
              }
}


function RechNom($nom)
{
  $dbh = Connection();
            echo"<table border=1px align=center>";
            echo"<thead>";
            echo"    <tr>";
            echo"        <td align=center>id Volontaire</td>";
            echo"        <td align=center>Nom Volontaire</td>";
            echo"        <td align=center>Age Volontaire</td>";
            echo"        <td align=center>Nombres de participations</td>";
            echo"    </tr>";
            echo"</thead>";
            $sql = "SELECT volontaire.idV, nomV, age, count(distinct estpresent.idM)as Nbpart from volontaire, estpresent where estpresent.idV=volontaire.idV and nomV like'%$nom%' group by volontaire.idV;";
            $sth = $dbh->query($sql); 
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            $dbh=NULL; 
            foreach ($result as $row) 
             {
               echo '<tr>';
               echo '<td align="center">'.$row['idV'].'</td>';
               echo '<td align="center">'.$row['nomV'].'</td>';
               echo '<td align="center">'.$row['age'].'</td>';
               echo '<td align="center">'.$row['Nbpart'].'</td>';
               echo '</tr>';
             }
}


function RechAge($agem,$ageM)
{
  $dbh = Connection();
            echo"<table border=1px align=center>";
            echo"<thead>";
            echo"    <tr>";
            echo"        <td align=center>Age Volontaire</td>";
            echo"        <td align=center>Nom Volontaire</td>";
            echo"        <td align=center>id Volontaire</td>";
            echo"    </tr>";
            echo"</thead>";
            $sql = "SELECT * FROM volontaire WHERE age>=$agem AND age<=$ageM";
            $sth = $dbh->query($sql); 
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            $dbh=NULL; 
            foreach ($result as $row) 
             {
               echo '<tr>';
               echo '<td align="center">'.$row['age'].'</td>';
               echo '<td align="center">'.$row['nomV'].'</td>';
               echo '<td align="center">'.$row['idV'].'</td>';
               echo '</tr>';
             }
}


function RechPart($part)
{
  $dbh = Connection();
            echo"<table border=1px align=center>";
            echo"<thead>";
            echo"    <tr>";
            echo"        <td align=center class=form>Nombre de participation</td>";
            echo"        <td align=center class=form>Id volontaire</td>";
            echo"        <td align=center class=form>Nom volontaire</td>";
            echo"    </tr>";
            echo"</thead>";
            $sql = "SELECT COUNT(estpresent.idV) AS NbPart, volontaire.idV, nomV FROM estpresent, volontaire WHERE estpresent.idV=volontaire.idV GROUP BY estpresent.idV HAVING COUNT(estpresent.idV)>=$part";
            $sth = $dbh->query($sql); 
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            $dbh=NULL; 
            foreach ($result as $row) 
             {
               echo '<tr>';
               echo '<td align="center">'.$row['NbPart'].'</td>';
               echo '<td align="center">'.$row['idV'].'</td>';
               echo '<td align="center">'.$row['nomV'].'</td>';
               echo '</tr>';
             }
}

function RechRespO()
{
  $dbh = Connection();
            
            echo"<table border=1px align=center>";
            echo"<thead>";
            echo"    <tr>";
            echo"        <td align=center>Id responsable</td>";
            echo"        <td align=center>Nom responsable</td>";
            echo"        <td align=center>Age responsable</td>";
            echo"    </tr>";
            echo"</thead>";
          
            $sql = "SELECT responsable, nomV, age FROM buvette, volontaire WHERE buvette.responsable=volontaire.idV GROUP BY responsable";
            $sth = $dbh->query($sql); 
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            $dbh=NULL; 
            foreach ($result as $row) 
             {
               echo '<tr>';
               echo '<td align="center">'.$row['responsable'].'</td>';
               echo '<td align="center">'.$row['nomV'].'</td>';
               echo '<td align="center">'.$row['age'].'</td>';
               echo '</tr>';
             }


}


function RechRespN()
{
  $dbh = Connection();
            
            echo"<table border=1px align=center>";
            echo"<thead>";
            echo"    <tr>";
            echo"        <td align=center>Id volontaire</td>";
            echo"        <td align=center>Nom volontaire</td>";
            echo"        <td align=center>Age volontaire</td>";
            echo"    </tr>";
            echo"</thead>";
          
            $sql = "SELECT * FROM volontaire WHERE idV NOT IN (SELECT responsable FROM buvette)";
            $sth = $dbh->query($sql); 
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            $dbh=NULL; 
            foreach ($result as $row) 
             {
               echo '<tr>';
               echo '<td align="center">'.$row['idV'].'</td>';
               echo '<td align="center">'.$row['nomV'].'</td>';
               echo '<td align="center">'.$row['age'].'</td>';
               echo '</tr>';
             }


}

function TakeID()
{
  $dbh = Connection();
  $sql = "SELECT NomU from utilisateur";
  $sth = $dbh->query($sql);
  $dbh = NULL;
}

function TakeMDP()
{
  $dbh = Connection();
  $sql = "SELECT mdp FROM utilisateur WHERE NomU=Admin";
  $sth = $dbh->query($sql);
  $dbh = NULL;
}

function Statistique($choix)
{
  echo "<form method=post name='stati' action='Result-Statistique.php'>";
  switch ($choix) 
  {
    case '1':
      echo "<p>Vous avez choisi d'afficher les 5 volontaires ayant été le plus présent.</p>";
      echo '<input type=hidden name=ch value="'.$choix.'"/>';
      echo "<br><input type=submit value=Envoyer>";
      echo "</form>";
      break;
    
    case '2':
      echo "<p>Vous avez choisi d'afficher les 5 buvettes qui ont rassemblé le plus de volontaire</p>";
      echo '<input type=hidden name=ch value="'.$choix.'"/>';
      echo "<br><input type=submit value=Envoyer>";
      echo "</form>";
      break;

    case '3':    
      echo "<p>Vous avez choisi d'afficher les buvettes ouvertes ainsi que les volontaires présents durant un match:</p>";
      echo "<input type=text name=code placeholder='Entrez le code du match' maxlength=2 size=30 autofocus required>";
      echo '<input type=hidden name=ch value="'.$choix.'"/>';
      echo "<br><input type=submit value=Envoyer>";
      echo "</form>";
      AfficheMatch(); 
      break;
  }
}

function Recherche($choix)
{
  echo "<form method=post name='Rech' class=form action='RechercheResultMembre.php'>";
  switch ($choix)
  {
    case '1':
      echo "Entrez le nom d'un volontaire (sans accent):";
      echo "<input type=text name=nomV id=Nom maxlength=20 size=26 placeholder=Ex:Dupont>";
      echo '<input type=hidden name=ch value="'.$choix.'"/>';
      echo "<br><input type=submit value=Envoyer>";
      echo "</form>";
      break;

    case '2':
      echo "Entrez une fourchette d'âge:";
      echo " <input type=text name=agem maxlength=2 placeholder=Age min><input type=text name=ageM maxlength=2 placeholder=Age max>";
      echo '<input type=hidden name=ch value="'.$choix.'"/>';
      echo "<br><input type=submit value=Envoyer>";
      echo "</form>";
      break;

    case '3':
      echo "Entrez un nombre minimal de participation:";
      echo "<input type=text name=part id=code maxlength=2 size=25 placeholder=Ex:2>";
      echo '<input type=hidden name=ch value="'.$choix.'"/>';
      echo "<br><input type=submit value=Envoyer>";
      echo "</form>";
      break;

    case '4':
      echo "Indiquez si vous souhaitez afficher les volontaires qui ont été responsable ou non:";
      echo "<label for=rechO>   Oui:</label><input type=radio name=rech id=rechO value=oui>
          <label for=rechN>Non:</label><input type=radio name=rech id=rechN value=non>";
      echo '<input type=hidden name=ch value="'.$choix.'"/>';
      echo "<br><input type=submit value=Envoyer>";
      echo "</form>";
      break;
  }
}


function Affectation($choix)
{
  switch ($choix) 
  {
    case '1':
        {
        echo "<p>Formulaire d'affectation de responsable:</p>";
        echo "Choisissez un match:";
        echo "<form name=Affectation method=post>";
        echo '<select name="ch" onchange="this.form.submit()">'; 
        $dbh=Connection();
        $sql="SELECT * from matchj";
        $sth=$dbh->query($sql);
        echo "<option value=0 >Choisissez</option>";
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
          echo "<input name=chh type=hidden value=$choix>";
          if(empty($_POST['ch']))
          {
            $ch = isset($_POST['ch']) ? $_POST['ch'] : NULL;
            AffecterResp($ch);
            echo "$ch=".$ch;
          }

        }
        
    break;
    
    case '2':
        echo "<p>Formulaire d'affectation de membre à une buvette lors d'un match</p>";
        echo " <form name=Affectation method=post action=Insertion.php>";
        echo "<label for=idvol>Veuillez entrer l'id du volontaire à affecter:</label><input type=text name=idvol Id=idvol size=2 maxlenght=2><br>";
        echo "<label for=idbuv>Veuillez entrer l'id de la buvette où sera affecter le volontaire:</label><input type=text name=idbuv Id=idbuv size=2 maxlenght=2><br>";
        echo "<input type=reset value=Recommencer> <input type=submit value=Envoyer>";
        echo "<input type=hidden value=$choix>";
        echo "</form>";
    break;
    
    case '3':

    break;
  }
}



function AffecterResp($ch)
{
      $dbh=Connection();
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
