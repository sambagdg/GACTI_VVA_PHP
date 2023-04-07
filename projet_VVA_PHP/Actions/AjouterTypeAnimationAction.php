<?php
include('Database.php');
if(isset($_POST['validertypeanim'])) {
    if(!empty($_POST['codetypeanim'] AND !empty($_POST['nomtypeanim']) )) {
        // les données de l'animation
        $codetypeanim= $_POST['codetypeanim'];
        $nomtypeanim= $_POST['nomtypeanim'];
        // image
        $image = $_FILES['photo']['tmp_name'];
        $trajet = "asset/img/".$_FILES['photo']['name'];
        move_uploaded_file($image, $trajet);
        // insérer la question dans la base de données
        $req = "INSERT INTO TYPE_ANIM VALUES ('$codetypeanim','$nomtypeanim','$trajet')";

        if ($con->query($req) == TRUE) {
            $successtype = "Ajout reussie !!";
            header('Refresh:3;URL=consulterAnim.php');
        }
    } else{
        $errortype = "vous devez remplir toues les champs";
    }
}