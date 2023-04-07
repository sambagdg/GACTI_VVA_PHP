
<?php

include("actions/connexionAction.php");
include ("includes/head.php");
include ("includes/navbar.php");
?>

<body>

<h2 class="titre-ajout">Connexion</h2>

<div class="container">
        <?php include("actions/connexionAction.php");?>
        <?php if (isset($errormsg)){?>
            <p class="error"><?php echo $errormsg;?></p>
            <?php
        }
        ?>
        <form class="text-center" method="post" >

                <div class="form-group">
                    <label for="">Login:</label>
                    <input class="zone_text" type="text" name="login" placeholder="Votre login"  >
                </div>

                <div class="form-group">
                    <label for="">Mot de passe:</label>
                    <input class="zone_text" type="password" name="password" placeholder="Votre mot de passe" >
                </div>

                <div class="form-group">
                    <input  type="submit" class="submit" value="Connexion" name="btconnexion">
                    <input type="reset" class="submit" value="Annuler">
                </div>
        </form>
    </div>
    <br>
    <br>
    <br>
</body>
<?php include "includes/footer.php"   ?>

