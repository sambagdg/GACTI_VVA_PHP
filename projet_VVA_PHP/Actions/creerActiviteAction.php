<?php
include "Database.php";

if (isset($_POST['creeract'])){
    $codeanim = $_GET['codeanim'];
    $dateact = $_POST['dateact'];
    $etat = $_POST['etat_act'];
    $heureRDV = $_POST['hrrdvact'];
    $prix = $_POST['prixact'];
    $heuredebut = $_POST['hrdebutact'];
    $heurefin = $_POST['hrfinact'];
    $nomresp = $_SESSION['nomcompte'];
    $prenomresp = $_SESSION['prenomcompte'];

    $reqEtat = "SELECT codeetatact FROM etat_act WHERE nometatact = '$etat'";
    $resultEtat  = mysqli_query($con, $reqEtat);
    while($enreg = mysqli_fetch_array($resultEtat)){
        $codeetat = $enreg["codeetatact"];
    }

    $query = "INSERT INTO ACTIVITE VALUES('$codeanim', '$dateact', '$codeetat', '$heureRDV', '$prix', '$heuredebut', '$heurefin',NULL, '$nomresp', '$prenomresp')";
    // mysqli_query($con, $query);

    if ($con->query($query) == TRUE)
    {
            $successact = "Création reussie !!";
            header('Refresh:3;URL=consulterAnim.php');
    }
    else
    {
        $erroract = "echouée...";
    }



}

?>
