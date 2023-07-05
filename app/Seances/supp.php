<?php
    require_once "../../configDB/connexionBD.php";
         if (isset($_GET["codeS"]) and substr($_GET["codeS"],-1) == "S" ) {
                $sql = "DELETE FROM seance WHERE codeS =?";
                $stm = $con->prepare($sql);
                $stm->execute(array($_GET["codeS"]));
                header("location: http://localhost/taher/app/Seances/liste.php");
        }
        if(isset($_GET["codeS"]) and substr($_GET["numAff"],-1) == "V"){
                $sql = "UPDATE seance as s 
                        inner join affectation as a on s.codeG = a.codeG
                        INNER JOIN formateur as f on a.matricule = f.matricule
                        SET s.valid = ? WHERE s.codeS = ? ";
                $stm = $con->prepare($sql);
                $stm->execute(array("1",$_GET["codeS"]));
                $numAff = substr($_GET["numAff"],0,-1);
                $sql2 = "UPDATE affectation   
                SET MHR = (
                SELECT tableHoraire.hour
                FROM (
                        SELECT SUM(s.heureS) as hour, a.codeM
                        FROM seance as s 
                        INNER JOIN affectation as a ON s.codeG = a.codeG
                        INNER JOIN module as m ON m.codeM = a.codeM
                        WHERE s.valid = 1 AND numAff = ?
                        GROUP BY a.codeM
                ) as tableHoraire
                )
                WHERE numAff = ?";
                $stm2 = $con->prepare($sql2);
                $stm2->execute(array($numAff,$numAff));
        header("Location: http://localhost/taher/app/Seances/liste.php");
        }
?>