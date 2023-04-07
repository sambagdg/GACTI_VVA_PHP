<?php
require ("Database.php");

if(isset($_POST['btconnexion']))
{
    if(!empty($_POST['login'] AND !empty($_POST['password'])))
    {
        $req = "SELECT * FROM COMPTE WHERE USER ='".$_POST['login']."' AND MDP='".$_POST['password']."'";
        if($resultat = mysqli_query($con,$req))
        {
            $ligne = mysqli_fetch_assoc($resultat);
            if ($ligne != 0){
                session_start();
                $_SESSION['auth'] = true;
                $_SESSION['nomcompte'] = $ligne['NOMCOMPTE'];
                $_SESSION['prenomcompte'] = $ligne['PRENOMCOMPTE'];
                $_SESSION['user'] = $ligne['USER'];
                $_SESSION['typeprofil'] = $ligne['TYPEPROFIL'];
                header('location:index.php');
            }
            else
            {
                $errormsg = "Oops!, le login ou le mot de passe est incorrect.";
            }
        }
    }
    else
    {
        $errormsg = "Vous devez completer tous les champs du formulaire. ";
    }
}