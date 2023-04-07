<?php
session_start();
include "includes/head.php";
include "includes/navbar.php";
include("actions/Database.php");
?>


<div class="container">
     <div class="position-relative titre-page">
      <h4 class="position-absolute top-0 start-50 translate-middle-x text-dark">Les inscris de l'activité</h4>
    </div>
    <br>
    <br>
    <br>
    <table class="table">
      <thead class="thead-dark bg-dark text-light">
        <tr>
          <th class="border-end" scope="col">Nom</th>
          <th class="border-end" scope="col">Prénom</th>
          <th class="border-end" scope="col">Date d'inscription</th>
          <th class="border-end" scope="col">État de l'inscription</th>
        </tr>
      </thead>
      <tbody>
      <?php

        $codeanim = $_GET['CODEANIM'];
        $dateact = $_GET['DATEACT'];

        $req = "SELECT NOMCOMPTE, PRENOMCOMPTE,INSCRIPTION.DATEINSCRIP,DATEANNULE FROM COMPTE INNER JOIN INSCRIPTION ON INSCRIPTION.USER = COMPTE.USER AND INSCRIPTION.CODEANIM = '$codeanim' AND INSCRIPTION.DATEACT = '$dateact'";
        $resultat = mysqli_query($con,$req);
        while($ligne = mysqli_fetch_assoc($resultat))
        {{?>
                <tr>
                  <th class="border-end" scope="row"><?php echo $ligne['NOMCOMPTE'] ;?></th>
                  <td class ="border-end"><?php echo $ligne['PRENOMCOMPTE']?></td>
                  <td class ="border-end"><?php echo date_format(date_create($ligne['DATEINSCRIP']), "d/m/Y");?></td>
                    <?php
                    if ($ligne['DATEANNULE'] != NULL){?>
                            <td class ="border-end"><?php echo "Cette personne s'est désinscrit le ".date_format(date_create($ligne['DATEANNULE']), "d/m/Y");?></td>
                            <?php
                    }else{?>
                        <td class ="border-end">Participe</td>
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
    <br>
    <br>
    <br>
    <div class="position-relative titre-page">
        <a href="lesActivites.php?codeanim=<?php echo $codeanim;?>&amp;DATEACT=<?php echo $dateact; ?>" class="position-absolute top-0 start-50 translate-middle-x btn btn-danger">Retour</a>
     </div>
</div>


