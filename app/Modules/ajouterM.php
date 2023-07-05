<?php require_once '../../template/header.php'; ?>
<link  rel="stylesheet" href="http://localhost/taher/assets/styles/styleAjouterM.css">
<body>
    
<?php require_once '../../template/navbar.php'; ?>

<form method="post">
    <table>
        <tr>
            <td>Code Module</td>
            <td><input type="text" name="cdm"></td>
        </tr>
        <tr>
            <td>Libelle</td>
            <td><input type="text" name="libelle"></td>
        </tr>
        <tr>
            <td>masseHoraire</td>
            <td><input type="text" name="msh"></td>
        </tr>
        <tr>
            <td></td>
            <td><button name="send">Ajouter</button></td>
        </tr>
    </table>
    </form>
    <?php
        if (isset($_POST["send"])) {
            require_once "../../configDB/connexionBD.php";
            $sql = "INSERT INTO module(codeM, libelle, masseHoraire) VALUES (?,?,?)";
            $stm = $con->prepare($sql);
            $stm->execute(array($_POST["cdm"],$_POST["libelle"],$_POST["msh"]));
            echo "Bien ajouter";
        }
    ?>
</body>
</html>