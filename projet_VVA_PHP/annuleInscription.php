<?php
session_start();
include("includes/head.php");
include("includes/navbar.php");
?>
<body >
        <?php
            include("actions/Database.php");
            $codeanim = $_GET['CODEANIM'];
            $dateact = $_GET['DATEACT'];
            $dateanulle = date('Y/m/d');
            $user = $_SESSION['user'];


            $req0 = "SELECT `DATEANNULE` FROM INSCRIPTION WHERE USER = '$user' AND CODEANIM = '$codeanim' AND DATEACT = '$dateact' ";
            $rep = mysqli_query($con,$req0);
            while($result = mysqli_fetch_array($rep)){
                $verif = $result['DATEANNULE'];
            }

            if ($verif == null) {
                $req1 = "UPDATE INSCRIPTION SET `DATEANNULE`='$dateanulle'
                         WHERE USER = '$user' AND CODEANIM = '$codeanim' AND DATEACT = '$dateact'";

                $result = mysqli_query($con, $req1);
                if($result){?>
                    <center>
                        <h1>
                            <span style="color: #3b9d1d;">Inscription annulé avec succées...</span>
                        </h1><br>
                    </center>
                    <?php
                }
            }else{?>
                <center>
                     <h1>
                         <span style="color: #9d1d1d;">Vous avez deja annulé votre inscription...</span>
                    </h1><br>
                 </center>
             <?php
        }
        header('Refresh:5;URL=mesActivite.php');
     ?>

    </body>


