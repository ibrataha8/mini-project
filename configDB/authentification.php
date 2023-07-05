<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/styleAuth.css">
    <title>Authentification</title>
</head>
<body>
    <footer>
        <img src="../assets/imgs/logo.png">
    </footer>
    <?php    
        require_once "connexionBD.php";

        if (isset($_POST["send"])) {
            $sql = "SELECT * FROM formateur as f 
                    inner join groupe as g on g.matricule = f.matricule
                    where f.matricule=? and f.psd=?";
            $stm= $con->prepare($sql);
            $stm->execute(array($_POST["mat"],($_POST["psd"])));
            if ($stm->rowCount()>=1) {
                session_start();
                $_SESSION["user"] = $stm->fetchAll(PDO::FETCH_ASSOC);
                header("Location:  http://localhost/taher/app/Profile/info.php");
            }else{
                echo "<center><strong><em>identification incorrecte</em></strong></center>";
            }
        }
    ?>

<center><h3>Authentifiquation</h3></center>
<div class="contant">   
    <div class="form-style-1">
    <form method="post">
            <table>
                <tr>
                    <td>Matricule :</td>
                    <td><input type="text" name="mat"></td>
                </tr>
                <tr>
                    <td>Mot de passe :</td>
                    <td><input type="password" name="psd"></td>
                </tr>
                <tr></tr>
                <tr>
                    <td></td>
                    <td><button name="send">Connecter</button></td>
                </tr>
            </table>
        </form>
        </div>
</div>
        
</body>
</html>