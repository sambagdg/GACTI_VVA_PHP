<?php
session_start();
include "includes/head.php";
include "includes/navbar.php";
 include("actions/Database.php");
?>

<body>
<div class="container">
    <div class="position-relative titre-page">
      <h4 class="position-absolute top-0 start-50 translate-middle-x text-dark">Les animations</h4>
    </div>

      <br>
      <br>
      <br>
    <div class="container-fluid">
<!--        <div class="container">-->
            <div class = "row">
                 <?php
                    $codeTypeAnim = $_GET['codetypeanim'];
                    $req = "SELECT * FROM animation";
                    $resultat = mysqli_query($con,$req);
                    while($ligne = mysqli_fetch_assoc($resultat))
                    {?>
                        <?php if ($ligne['CODETYPEANIM'] == $codeTypeAnim)
                         {?>
                              <div class="card col-xs-12 col-sm-4 col-md-4 col-lg-4 bg-dark" style="width: 18rem;">
                                <img src="<?php echo $ligne['PHOTO'];?>" alt="Image" height="150" width="286" style="margin-left: -12px" class="border-bottom">
                                <div class="card-body">
                                  <h5 class="card-title text-light border text-center"><?php echo $ligne['NOMANIM'];?></h5>
                                  <a href="detailAnimation.php?codeanim=<?= $ligne['CODEANIM']; ?>"  class="btn btn-primary border-bottom">detail</a><br>
                                  <a href="lesActivites.php?codeanim=<?= $ligne['CODEANIM'];?>"  class="btn btn-secondary border-bottom">les activités</a><br>
                                    <?php
                                        if (isset($_SESSION['typeprofil']) AND $_SESSION['typeprofil'] == 'en'){?>
                                            <a href="creeActivite.php?codeanim=<?= $ligne['CODEANIM']; ?>"
                                            class="btn btn-warning border-bottom">créer une activite</a>
                                        <?php
                                        }
                                    ?>
                                </div>
                              </div>
                            <?php
                         }
                    }
                    ?>
            </div>
<!--        </div>-->
    </div>
</body>
<br>
    <br>
    <br>

<?php

?>

</div>
