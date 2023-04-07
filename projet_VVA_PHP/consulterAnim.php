<?php
session_start();
include "includes/head.php";
include "includes/navbar.php";
 include("actions/Database.php");
?>

<body>


    <div class="container-fluid">
        <div class="container">
             <div class="position-relative titre-page">
          <h4 type="input" class="position-absolute top-0 start-50 translate-middle-x">Les types d'animation</h4>
        </div>

          <br>
          <br>
          <br>
            <div class = "row">
                 <?php
                    $req = "SELECT * FROM type_anim";
                    $resultat = mysqli_query($con,$req);
                    while($ligne = mysqli_fetch_assoc($resultat))
                    {?>
                              <div class="card col-xs-12 col-sm-4 col-md-4 col-lg-4 bg-dark" style="width: 18rem;">
                                <img src="<?php echo $ligne['PHOTO'];?>" alt="Image" height="150" width="286" style="margin-left: -12.5px; margin-top: -0.5px " class="border-bottom">
                                <div class="card-body">
                                  <h5 class="card-title text-light border-bottom text-center"><?php echo $ligne['NOMTYPEANIM'];?></h5>
                                  <a href="lesAnimation.php?codetypeanim=<?= $ligne['CODETYPEANIM'];?>" class="btn btn-primary border-bottom">Consulter les animations</a>
                                </div>
                              </div>
                            <?php
                    }
                    ?>
            </div>
        </div>
    </div>

</body>
<br>
    <br>
    <br>

<?php
include "includes/footer.php";
?>