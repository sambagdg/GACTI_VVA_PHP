<?php
session_start();
include "actions/verifAction.php";
include "includes/head.php";
include "includes/navbar.php";
?>


<body >
        <?php
            include("actions/Database.php");
            $username = $_SESSION['user'];
            $codeanim = $_GET['CODEANIM'];
            $dateact = $_GET['DATEACT'];
            $dateinscription = date('Y/m/d');

            $req0 = "SELECT USER, CODEANIM, DATEACT FROM INSCRIPTION 
                     WHERE USER = '$username' AND CODEANIM = '$codeanim' AND DATEACT = '$dateact'";
            $rep = mysqli_query($con,$req0);
            $verif = mysqli_num_rows($rep);

            if ($verif == 0) {
                $req1 = "INSERT INTO `INSCRIPTION`(`NOINSCRIP`, `USER`,`CODEANIM`, `DATEACT`, `DATEINSCRIP`, `DATEANNULE`) 
                         VALUES ('0','$username', '$codeanim', '$dateact', ' $dateinscription', null)";

                $result = mysqli_query($con, $req1);
                if($result){ ?>
                    <center>
                        <h1 style="color: #428227;">
                            Vous avez été inscrit à cette activité avec succées
                        </h1><br>
                        <p>
                            vous pourrez la retrouver dans la section "Mes activités";
                        </p>
                    </center>
                    <?php
                }
            }else{
                ?>
                <center>
                    <h1>
                        <span style="color: #a11616;">Vous êtes deja inscrit à cette activité</span>
                    </h1><br>
                    <p>
                        vous pourrez la retrouver dans la section "Mes activités"
                    </p>
                </center>
                <?php
            }
        header('Refresh:3;URL=consulterAnim.php');
        ?>
</body>