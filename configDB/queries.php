<?php
$queryListFormators = "SELECT * from seance as s 
inner JOIN groupe as g on g.codeG = s.codeG 
INNER JOIN affectation as a on a.codeG = g.codeG
INNER join formateur as f on a.matricule = f.matricule
inner JOIN module as m on m.codeM = a.codeM 
where f.matricule = ?";

$queryListGrpMdl = "SELECT g.*,a.*,m.*  from groupe as g
            inner join affectation as a on a.matricule = g.matricule
            inner join module as m on a.codeM = m.codeM
            where  a.matricule=?";

$queryInfoForm = "SELECT * FROM `affectation` as a
INNER JOIN module as m on m.codeM = a.codeM
INNER JOIN formateur as f on f.matricule = a.matricule
where f.matricule = ?";

$queryListeMdl = "SELECT * FROM `affectation` as a
INNER JOIN module as m on m.codeM = a.codeM
INNER JOIN formateur as f on f.matricule = a.matricule
where f.matricule = ?";

?>