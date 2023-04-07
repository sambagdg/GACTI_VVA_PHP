<?php
session_start();
include "includes/head.php";
include "includes/navbar.php";
 include("actions/Database.php");
?>




<div class="container">
    <div class="position-relative titre-page">
      <h4 class="position-absolute top-0 start-50 translate-middle-x text-dark">Les activités de l'animation</h4>
    </div>
    <br>
    <br>
    <br>
     <table class="table">
      <thead class="thead-dark bg-dark text-light">
        <tr>
          <th class="border-end" scope="col">Nom de l'activité</th>
          <th class="border-end" scope="col">Date de l'activité</th>
          <th class="border-end" scope="col">Heure de rendez-vous</th>
          <th class="border-end" scope="col">Heure de début</th>
          <th class="border-end" scope="col">Heure de fin</th>
          <th class="border-end" scope="col">État de l'activité</th>
          <th class="border-end" scope="col">Prix de l'activité</th>
          <th class="border-end" scope="col">Responsable</th>
          <th class="border-end" scope="col">actions</th>

        </tr>
      </thead>
      <tbody>
      <?php
        include ("actions/Database.php");
        $codeanim = $_GET['codeanim'];
        // Recupération du nom de l'animation
        $reqAnim = "SELECT nomanim FROM animation WHERE codeanim = '$codeanim'";
        $resultAnim  = mysqli_query($con, $reqAnim);
        while($enreg = mysqli_fetch_array($resultAnim)){
            $nomanim = $enreg["nomanim"];
        }
        // Recpération des informations de l'activité
        $req = "SELECT codeanim,dateact, codeetatact, hrrdvact, prixact,hrdebutact, hrfinact, nomresp,prenomresp,dateannuleact FROM activite";
        $resultat = mysqli_query($con,$req);
        while($ligne = mysqli_fetch_assoc($resultat))
        {
            $codeetat = $ligne['codeetatact'];
             // Recupération du nom d'etat
            $reqEtat = "SELECT nometatact FROM etat_act WHERE codeetatact = '$codeetat'";
            $resultEtat  = mysqli_query($con, $reqEtat);
            while($enreg = mysqli_fetch_array($resultEtat)){
            $nometat = $enreg["nometatact"];
            }
            // Affichage des informations de l'activité
            if ($ligne['codeanim'] == $codeanim)
            {?>
                <tr>
                  <th class="border-end" scope="row"><?php echo $nomanim;?></th>
                  <td class="border-end"><?php echo "le ".date_format(date_create($ligne['dateact']), "d/m/Y");;?></td>
                  <td class="border-end"><?php echo $ligne['hrrdvact'];?></td>
                  <td class="border-end"><?php echo  $ligne['hrdebutact'];?></td>
                  <td class="border-end"><?php echo $ligne['hrfinact'];?></td>
                  <td class="border-end"><?php echo $nometat;?></td>
                  <td class="border-end"><?php echo $ligne['prixact']." €";?></td>
                  <td class="border-end"><?php echo $ligne['nomresp']." ".$ligne['prenomresp'];?></td>
                  <?php
                    if (isset($_SESSION['typeprofil']) AND $_SESSION['typeprofil'] == 'va'){?>
                         <?php
                        if ($ligne['codeetatact'] == 2 AND $ligne['dateannuleact'] != null){?>
                        <td>
                            <?php echo "Cette a été annulé le ".date_format(date_create($ligne['dateannuleact']), "d/m/Y");?>
                            <a href="inscription.php?CODEANIM=<?php echo $ligne['codeanim'];?>&amp;DATEACT=<?php echo $ligne['dateact']; ?>" class="btn btn-primary disabled">M'inscrire</a><br>
                        </td>

                            <?php
                        }else{?>

                            <td>
                                <a href="inscription.php?CODEANIM=<?php echo $ligne['codeanim'];?>&amp;DATEACT=<?php echo $ligne['dateact']; ?>" class="btn btn-primary ">M'inscrire</a><br>

                            </td>
                            <?php

                        }
                        ?>

                        <?php
                    }elseif(isset($_SESSION['typeprofil']) AND $_SESSION['typeprofil'] == 'en'){?>
                        <td>
                            <a href="listeInscris.php?CODEANIM=<?php echo $ligne['codeanim'];?>&amp;DATEACT=<?php echo $ligne['dateact']; ?>" class="btn btn-primary " >Voir la liste des inscris</a><br>
                            <a href="annuleActiviteEnc.php?CODEANIM=<?php echo $ligne['codeanim'];?>&amp;DATEACT=<?php echo $ligne['dateact']; ?>" class="btn btn-warning" >Annuler l'activité </a>
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
        <a href="consulterAnim.php" class="position-absolute top-0 start-50 translate-middle-x btn btn-danger">Retour</a>
     </div>



</div>

