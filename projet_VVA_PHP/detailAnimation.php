<?php
session_start();
include "includes/head.php";
include "includes/navbar.php";
 include("actions/Database.php");
?>


<div class="container">
     <div class="position-relative titre-page">
      <h4 class="position-absolute top-0 start-50 translate-middle-x text-dark">Detail de l'animation</h4>
    </div>
    <br>
    <br>
    <br>
    <table class="table">
      <thead class="thead-dark bg-dark text-light">
        <tr>
          <th class="border-end" scope="col">Nom de l'animation</th>
          <th class="border-end" scope="col">Validité</th>
          <th class="border-end" scope="col">Durée</th>
          <th class="border-end" scope="col">Difficulté</th>
          <th class="border-end" scope="col">Age limité</th>
          <th class="border-end" scope="col">Prix</th>
          <th class="border-end" scope="col">Nombre de places</th>
          <th class="border-end" scope="col">Date de création</th>
          <th class="border-end" scope="col">actions</th>

        </tr>
      </thead>
      <tbody>
      <?php
        include ("actions/Database.php");
        $codeTypeAnim = $_GET['codeanim'];
        $req = "SELECT * FROM animation";
        $resultat = mysqli_query($con,$req);
        while($ligne = mysqli_fetch_assoc($resultat))
        {
            if ($ligne['CODEANIM'] == $codeTypeAnim)
            {?>
                <tr>
                  <th class="border-end" scope="row"><?php echo $ligne['NOMANIM'] ;?></th>
                  <td class ="border-end"><?php echo "jusqu'au ".date_format(date_create($ligne['DATEVALIDITEANIM']), "d/m/Y");?></td>
                  <td class ="border-end"><?php echo $ligne['DUREEANIM']." h"?></td>
                  <td class ="border-end"><?php echo $ligne['DIFFICULTEANIM']?></td>
                  <td class ="border-end"><?php echo $ligne['LIMITEAGE']." ans"?></td>
                  <td class ="border-end"><?php echo $ligne['TARIFANIM']." €"?></td>
                  <td class ="border-end"><?php echo $ligne['NBREPLACEANIM']?></td>
                  <td class ="border-end"><?php echo date_format(date_create($ligne['DATECREATIONANIM']), "d/m/Y"); ?></td>
                  <td>
                      <a href="lesActivites.php?codeanim=<?= $ligne['CODEANIM']; ?>" class="btn btn-primary">Voir les activités de l'animation</a>
                      <a href="consulterAnim.php" class="btn btn-danger">Retour</a>
                  </td>
                </tr>
             <?php
            }
        }
        ?>
      </tbody>
    </table>

</div>


