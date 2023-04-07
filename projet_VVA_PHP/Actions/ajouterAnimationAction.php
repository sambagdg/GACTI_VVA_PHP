<?php
include('Database.php');
if(isset($_POST['valideranim']))
{
    if(!empty($_POST['codeanim'] AND !empty($_POST['nomanim'])))
    {
        // les données de l'animation
        $codeanim= $_POST['codeanim'];
        $nomtypeanim= $_POST['codetypeanim'];
        $nomanim= $_POST['nomanim'];
        $datecreationanim= date("Y,m,d");
        $datevaliditeanim= $_POST['datevaliditeanim'];
        $dureeanim= $_POST['dureeanim'];
        $limiteage= $_POST['limiteage'];
        $tarifanim= $_POST['tarifanim'];
        $nbreplaceanim= $_POST['nbreplaceanim'];
        $descripanim= $_POST['descripanim'];
        $commentanim= $_POST['commentanim'];
        $difficulteanim= $_POST['difficulteanim'];
        // image
        $image = $_FILES['photo']['tmp_name'];
        $trajet = "asset/img/".$_FILES['photo']['name'];
        move_uploaded_file($image, $trajet);

        // Recupération du code du type d'animation
        $reqcodetypeanim= "SELECT codetypeanim FROM type_anim WHERE nomtypeanim= '$nomtypeanim'";
        $resultcodetypeanim  = mysqli_query($con,  $reqcodetypeanim);
        while($enreg = mysqli_fetch_array($resultcodetypeanim)){
            $codetypeanim = $enreg["codetypeanim"];
        }

        // insérer la question dans la base de données
        $req = "INSERT INTO ANIMATION VALUES ('$codeanim','$codetypeanim', '$nomanim ','$datecreationanim','$datevaliditeanim','$dureeanim','$limiteage','$tarifanim','$nbreplaceanim','$descripanim','$commentanim','$difficulteanim','$trajet')";

        if ($con->query($req))
        {
            $successanim = "Ajout reussie !!";
//            header('Refresh:3;URL=consulterAnim.php');
        }

    }
    else{
        $erroranim = "vous devez remplir tous les champs";
    }
}




