
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="index.php">GACTI VVA</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
            if(isset($_SESSION['auth']) AND $_SESSION['typeprofil'] == 'en'){?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>

                <li class="nav-item" >
                  <a class="nav-link " href ="consulterAnim.php">Voir les animations</a>
                </li>

                 <li class="nav-item">
                  <a class="nav-link" href="consulterAnim.php">Voir les activités</a>
                </li>

                 <li class="nav-item">
                  <a class="nav-link" href="ajoutAnim.php">Ajouter une animation</a>
                 </li>

                <li class="nav-item">
                  <a class="nav-link" href="consulterAnim.php">Créer une activité</a>
                </li>

                <li class="nav-item" >
                  <a class="nav-link " href ="actions/deconnexionAction.php">Deconnexion</a>
                </li>


               <?php
            }elseif(isset($_SESSION['auth']) AND $_SESSION['typeprofil'] == 'va'){?>

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>

                <li class="nav-item" >
                  <a class="nav-link " href ="consulterAnim.php">Voir les animations</a>
                </li>

                <li class="nav-item" >
                  <a class="nav-link " href ="mesActivite.php">Mes activités</a>
                </li>

                 <li class="nav-item" >
                  <a class="nav-link " href ="actions/deconnexionAction.php">Deconnexion</a>
                </li>

                <?php

            }else{?>

                <li class="nav-item">
                  <a class="nav-link" href="connexion.php">Connexion</a>
                </li>

                 <li class="nav-item" >
                  <a class="nav-link " href ="consulterAnim.php">Voir les animations</a>
                </li>

                <?php
            }
            ?>
      </ul>
        <?php
         if(isset($_SESSION['auth']) AND $_SESSION['typeprofil'] == "en"){?>
             <li class="visiteur d-flex" >
                <a class="text-light text-uppercase"><?php echo 'encadrant : '.$_SESSION['nomcompte'].' '.$_SESSION['prenomcompte']; ?></a>
            </li>
            <?php
         }elseif(isset($_SESSION['auth']) AND $_SESSION['typeprofil'] == "va"){?>
             <li class="visiteur d-flex" >
                <a class="text-light text-uppercase"><?php echo 'vacancier : '.$_SESSION['nomcompte'].' '.$_SESSION['prenomcompte']; ?></a>
            </li>
            <?php
        }
        ?>
    </div>
  </div>
</nav>

<br>
<br>
<br>