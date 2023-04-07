<?php
session_start();
include "includes/head.php";
include "includes/navbar.php";
 include("actions/Database.php");
?>

    <div class="position-relative titre-page">
      <h4 class="position-absolute top-0 start-50 translate-middle-x text-dark">Mes activités</h4>
    </div>
    <br>
    <br>
    <br>


<div class="container">
    <table class="table">
      <thead class="thead-dark bg-dark text-light">
        <tr>
          <th class="border-end" scope="col">Nom de l'activité</th>
          <th class="border-end" scope="col">Date de l'activité</th>
          <th class="border-end" scope="col">Heure de rendez-vous</th>
          <th class="border-end" scope="col">Heure de début</th>
          <th class="border-end" scope="col">Heure de fin</th>
          <th class="border-end" scope="col">Prix de l'activité</th>
          <th class="border-end" scope="col">Responsable</th>
          <th class="border-end" scope="col">actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
        include ("actions/Database.php");
        $user = $_SESSION['user'];

        // Recpération des informations de l'activité
        $req = "SELECT ACTIVITE.CODEANIM, ACTIVITE.DATEACT, CODEETATACT, HRRDVACT, PRIXACT, HRDEBUTACT,HRFINACT, DATEANNULEACT,DATEANNULE, NOMRESP, PRENOMRESP FROM ACTIVITE 
                INNER JOIN INSCRIPTION ON INSCRIPTION.USER = '$user' AND ACTIVITE.codeanim = INSCRIPTION.codeanim AND ACTIVITE.dateact = INSCRIPTION.dateact;";
        $resultat = mysqli_query($con, $req);

        while($ligne = mysqli_fetch_assoc($resultat))
        {
            $codeetat = $ligne["CODEETATACT"];
            $codeanim = $ligne['CODEANIM'];
             // Recupération du nom d'etat
            $reqEtat = "SELECT nometatact FROM etat_act WHERE codeetatact = '$codeetat'";
            $resultEtat  = mysqli_query($con, $reqEtat);
            while($enreg = mysqli_fetch_array($resultEtat)){
            $nometat = $enreg["nometatact"];
            }

            // Recupération du nom de l'animation
            $reqAnim = "SELECT nomanim FROM animation WHERE codeanim = '$codeanim'";
            $resultAnim  = mysqli_query($con, $reqAnim);
            while($enreg = mysqli_fetch_array($resultAnim)){
                $nomanim = $enreg["nomanim"];
            }

            // Affichage des informations de l'activité
            if ($ligne['CODEANIM'] == $codeanim)
            {?>
                <tr>
                  <th class="border-end" scope="row"><?php echo $nomanim;?></th>
                  <td class="border-end"><?php echo "le ".$ligne['DATEACT'];?></td>
                  <td class="border-end"><?php echo $ligne['HRRDVACT'];?></td>
                  <td class="border-end"><?php echo  $ligne['HRDEBUTACT'];?></td>
                  <td class="border-end"><?php echo $ligne['HRFINACT'];?></td>
                  <td class="border-end"><?php echo $ligne['PRIXACT']."€";?></td>
                  <td class="border-end"><?php echo $ligne['NOMRESP']." ".$ligne['PRENOMRESP'];?></td>
                  <?php
                    if (isset($_SESSION['typeprofil']) AND $_SESSION['typeprofil'] == 'va'){?>

                        <?php
                        if ($ligne['DATEANNULE'] != NULL OR $ligne['DATEANNULEACT'] != NULL){?>

                                <td>
                                    <?php echo "cet activité a été annulé" ;?>
                                    <a href="annuleInscription.php?CODEANIM=<?php echo $ligne['CODEANIM'];?>&amp;DATEACT=<?php echo $ligne['DATEACT']; ?>" class="btn btn-danger disabled">Me désinscription</a>
                                </td>
                                <?php
                        }else{?>
                            <td>
                                <a href="annuleInscription.php?CODEANIM=<?php echo $ligne['CODEANIM'];?>&amp;DATEACT=<?php echo $ligne['DATEACT']; ?>" class="btn btn-danger">Me désinscription</a>
                             </td>
                            <?php
                            }
                        ?>

                        <?php
                    }elseif(isset($_SESSION['typeprofil']) AND $_SESSION['typeprofil'] == 'en'){?>
                        <td>
                            <a href="listeInscris.php?CODEANIM=<?php echo $ligne['codeanim'];?>&amp;DATEACT=<?php echo $ligne['dateact']; ?>" class="btn btn-primary">Voir les inscris</a><br>
                            <a href="annuleActiviteEnc.php?CODEANIM=<?php echo $ligne['codeanim'];?>&amp;DATEACT=<?php echo $ligne['dateact']; ?>" class="btn btn-danger">Annuler l'activité</a>
                            <br>
                        </td>
                        <?php
                    }else{?>
                        <td>
                            <a href="connexion.php" class="btn btn-primary bg-success">Se connecter</a><br>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
             <?php
            }
        }
        ?>
      </tbody>
    </table>
        <div class="position-relative titre-page">
         <a href="consulterAnim.php" class="position-absolute top-0 start-50 translate-middle-x btn btn-warning">Retour</a><br>
        </div>
</div>



