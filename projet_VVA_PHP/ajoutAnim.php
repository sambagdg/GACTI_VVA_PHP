<?php
session_start();
//include("actions/verifAction.php");
include ("includes/head.php");
include ("includes/navbar.php");
?>

<?php
if (isset($_SESSION['auth']) AND $_SESSION['typeprofil'] == "en"){?>
          <!-- Form ajouter un type d'animation -->
    <h5 class="titre-ajout">Ajouter un type d'animation</h5>
    <div class="container">
        <?php include("actions/AjouterTypeAnimationAction.php");?>
        <?php if (isset($successtype)){?>
            <p class="success"><?php echo $successtype;?></p>
            <?php
        }elseif(isset($errortype)){?>
            <p class="error"><?php echo $errortype;?></p>
            <?php
        }
        ?>
        <form  method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Code du type d'animation:</label>
                    <input class="zone_text" type="text" name="codetypeanim" required >
                </div>

                <div class="form-group">
                    <label for="">nom du type d'animation:</label>
                    <input class="zone_text" type="text" name="nomtypeanim" required>
                </div>

                <div class="form-group">
                    <label >Photo:</label>
                    <input class="zone_text" type="file" name="photo"  required>
                </div>

                <div class="form-group">
                    <input  type="submit" class="btn btn-primary" value="Insérer" name="validertypeanim">
                    <input type="reset" class="btn btn-danger" value="Annuler">
                </div>

        </form>
    </div>

    <br>
    <br>
    <br>



    <!-- Form ajouter une animation -->
    <h5 class="titre-ajout">Ajouter une animation</h5>
    <div class="container">
        <?php include("actions/ajouterAnimationAction.php");?>
        <?php if (isset($successanim)){?>
            <p class="success"><?php echo $successanim;?></p>
            <?php
        }elseif(isset($erroranim)){?>
            <p class="error"><?php echo $erroranim;?></p>
            <?php
        }
        ?>
        <form  method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Code de l'animation:</label>
                    <input class="zone_text" type="text" name="codeanim" required>
                </div>

                <div class="form-group">
                    <label for="">Code du type d'animation:</label>
                    <label>
                       <select name="codetypeanim">
                           <option></option><?php
                           $req = "SELECT codetypeanim, nomtypeanim FROM type_anim";
                           $resultat = mysqli_query($con,$req);
                           while($ligne = mysqli_fetch_assoc($resultat)){?>
                           <option><?php echo $ligne['nomtypeanim'];?> </option>
                           <?php
                           }
                           ?>
                       </select>
                    </label>
                </div>

                <div class="form-group">
                    <label for="">nom de l'animation:</label>
                    <label>
                        <input class="zone_text" type="text" name="nomanim" required>
                    </label>
                </div>

                <div class="form-group">
                    <label for="">Date de validité:</label>
                    <label>
                        <input class="zone_text" type="date" name="datevaliditeanim">
                    </label>
                </div>

                <div class="form-group">
                    <label for="">Durée de l'animation:</label>
                    <label>
                        <input class="zone_text" type="number" name="dureeanim" required>
                    </label>
                </div>

                <div class="form-group">
                    <label for="">Age limité:</label>
                    <label>
                        <input class="zone_text" type="number" name="limiteage">
                    </label>
                </div>

                <div class="form-group">
                    <label for="">Prix:</label>
                    <label>
                        <input class="zone_text" type="text" name="tarifanim" placeholder="exemple 5.00..">
                    </label>
                </div>

                <div class="form-group">
                    <label for="">Nombre de place(s):</label>
                    <label>
                        <input class="zone_text" type="number" name="nbreplaceanim">
                    </label>
                </div>

                <div class="form-group">
                    <label for="">Difficulté:
                        <input class="zone_text" type="text" name="difficulteanim">
                    </label>
                </div>

                 <div class="form-group">
                    <label >Photo:</label>
                    <input class="zone_text" type="file" name="photo"  required>
                </div>

                 <div class="form-group">
                    <label for="">Description:
                        <input class="zone_text" type="text" name="descripanim">
                    </label>
                </div>

                <div class="form-group">
                    <label for="">Commentaire:
                        <input class="zone_text" type="text" name="commentanim">
                    </label>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Insérer" name="valideranim">
                    <input type="reset" class="btn btn-danger" value="Annuler" href="index.php">
                </div>

        </form>
    </div>
    <br>
    <br>
    <br>
        <?php

}else{?>

    <center>
        <h1>
            <span style="color: #9a1c1c;">PEUP PEUP PEUP !!! VOUS FAITES QUOI LA, RETOURNEZ DANS VOTRE PAGE...</span>
        </h1><br>
    </center>

    <?php
    header('Refresh:10;URL=index.php');

}




?>



</body>
<?php include "includes/footer.php" ?>