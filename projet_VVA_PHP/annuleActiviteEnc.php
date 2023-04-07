<?php
session_start();
include ("includes/head.php");
include ("includes/navbar.php");
?>
<body >
        <?php
            include("actions/Database.php");
            $codeanim = $_GET['CODEANIM'];
            $dateact = $_GET['DATEACT'];
            $dateanulle = date('Y/m/d');

            $req0 = "SELECT DATEANNULEACT FROM ACTIVITE WHERE CODEANIM = '$codeanim' AND DATEACT = '$dateact' ";
            $rep = mysqli_query($con,$req0);
            while($result = mysqli_fetch_array($rep)){
                $verif = $result['DATEANNULEACT'];
            }

            if ($verif == null) {
                $req1 = "UPDATE `ACTIVITE` SET `DATEANNULEACT`='$dateanulle',`CODEETATACT`='2'
                         WHERE CODEANIM = '$codeanim' AND DATEACT = '$dateact'";

                $result = mysqli_query($con, $req1);
                if($result){?>
                    <center>
                        <h1>
                            <span style="color: #4e9d1d;">Activité annulé avec succées ...</span>
                        </h1><br>
                    </center>
                    <?php
                }
            }else{?>
                <center>
                     <h1>
                         <span style="color: #9d1d1d;">Cet activité a deja été annulé...</span>
                    </h1><br>
                 </center>
             <?php
        }
        header('Refresh:5;URL=consulterAnim.php');
     ?>

    </body>


