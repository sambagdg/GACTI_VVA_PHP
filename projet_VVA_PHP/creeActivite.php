
<?php
session_start();
include("actions/verifAction.php");
include ("includes/head.php");
include ("includes/navbar.php");
?>
    <!-- Form ajouter un type d'animation -->
    <h2 class="titre-ajout">Créer une activité</h2>
    <div class="container">


        <form  method="post" >
        <?php include("actions/creerActiviteAction.php");?>
        <?php if (isset($successact)){?>
            <p class="success"><?php echo $successact;?></p>
            <?php
        }elseif(isset($erroract)){?>
            <p class="error"><?php echo $erroract;?></p>
            <?php
        }
        ?>

                <div class="form-group">
                    <label for="">Date de l'activité:</label>
                    <input class="zone_text" type="date" name="dateact" required >
                </div>

                <div class="form-group">
                    <label for="">Etat de l'activité:</label>
                    <label>
                       <select name="etat_act">
                           <option></option><?php
                           $req = "SELECT nometatact FROM etat_act";
                           $resultat = mysqli_query($con,$req);
                           while($ligne = mysqli_fetch_assoc($resultat)){?>
                           <option><?php echo $ligne['nometatact'];?> </option>
                           <?php
                           }
                           ?>
                       </select>
                    </label>
                </div>

                <div class="form-group">
                    <label >Heure de rendez-vous :</label>
                    <input class="zone_text" type="time" name="hrrdvact"  required>
                </div>

                <div class="form-group">
                    <label for="">Prix de l'activité:</label>
                    <input class="zone_text" type="text" name="prixact" required >
                </div>

                <div class="form-group">
                    <label >Heure de départ :</label>
                    <input class="zone_text" type="time" name="hrdebutact"  required>
                </div>

                <div class="form-group">
                    <label >Heure de fin :</label>
                    <input class="zone_text" type="time" name="hrfinact"  required>
                </div>

                <div class="form-group">
                    <input  type="submit" class="btn btn-primary" value="Insérer" name="creeract">
                    <input type="reset" class="btn btn-danger" value="Annuler">
                </div>

        </form>
    </div>

    <br>
    <br>
    <br>

<?php include "includes/footer.php"   ?>
