<?php
require_once "./configDB/connexionBD.php";
require_once "./configDB/queries.php";
$QUERY_STRING = [];
parse_str($_SERVER['QUERY_STRING'], $QUERY_STRING); //?query=

session_start();
$mat = $_SESSION["user"][0]["matricule"];


header('Content-Type: application/json; charset=utf-8');
if($QUERY_STRING['query'] == 'listFormateurs'){
    $stm = $con->prepare($queryListFormators);
    $stm->execute(array($mat));
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}
if($QUERY_STRING['query'] == 'listGroupes'){
    $stm = $con->prepare($queryListGrpMdl   );
    $stm->execute(array($mat));
    $groupes = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($groupes);
}

if($QUERY_STRING['query'] == 'infoForm'){
    $stm = $con->prepare($queryInfoForm);
    $stm->execute(array($mat));
    $listeM = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($listeM );
}

if($QUERY_STRING['query'] == 'listeModul'){
    $stm = $con->prepare($queryListeMdl);
    $stm->execute(array($mat));
    $listeM = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($listeM );
}