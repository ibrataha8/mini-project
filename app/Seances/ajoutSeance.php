<?php
    require_once "../../configDB/connexionBD.php";
        $sql = "INSERT INTO seance(dateS, heureD, heureF, heureS, codeG, typeS,objS,typeC,nbreAbsc,nomModule) VALUES (?,?,?,?,?,?,?,?,?,?) ";
        $stm = $con->prepare($sql);
        $stm->execute(array($_POST["dateS"],$_POST["heureD"],$_POST["heureF"],($_POST["heureF"]-$_POST["heureD"]),$_POST["grp"],$_POST["typs"],$_POST["objS"],$_POST["typeC"],$_POST["nbrAbscence"],$_POST["mdl"]));
        header("Location: http://localhost/taher/app/Seances/liste.php");
?>