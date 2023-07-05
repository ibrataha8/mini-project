<?php
session_start();
require_once "../../configDB/connexionBD.php";
$frm = $_SESSION["user"][0];
?>
<?php require_once '../../template/header.php'; ?>

<body>
    
    <?php require_once '../../template/navbar.php'; ?>
    <div class="container">
        <h2><i class="fas fa-user"></i> Informations du Formateur</h2>

        <div class="formateur-info">
            <label>Nom:</label>
            <span><em><?= $frm["nom"] . ' ' . $frm["prenom"] ?></em></span>
        </div>

        <div class="formateur-info">
            <label>Matricule:</label>
            <span><em><?= $frm["matricule"] ?></em></span>
        </div>

        <div class="formateur-info">
            <label>Modules réalisés:</label>
            <ul class="module-list" id="moduleRealise"></ul>
        </div>
        <div class="formateur-info">
            <label>Modules enseignés:</label>
            <ul class="module-list" id="moduleEnseigner"></ul>
        </div>
        <div>
            
        <div class="module-list">
            <label>Masse Horaire Restent</label>

            <div class="module-item" id="calculeDuree">
                    <div class="module-card">
                        <div class="progress-bar" id="progressBare">
                        </div>
                    </div>
                </div>
        </div>
    
    </div>

    <script>
        function remplirList(prop1,prop2,entries){
                let lines = ""
                for (const entry of entries) {
                    console.log(entry)
                    lines += `<li class="module-item infoMdl">
                            <span class="module-name">${entry[prop1]}</span>
                            <span class="module-duration">${entry[prop2]} heures</span>
                        </li>`;
                }
                    return lines;
        }
        getData("http://localhost/taher/api.php?query=infoForm").then(function(data) {
            console.log(data)
            document.querySelector('#moduleRealise').innerHTML = remplirList("libelle","MHR",data);
            document.querySelector('#moduleEnseigner').innerHTML = remplirList("libelle","masseHoraire",data);
            let lines = ""
                for (const {libelle,MHR,masseHoraire} of data) {
                    lines += `
                                <span class="module-name" style="font-weight: 400;">${libelle}</span>
                                <span class="module-duration">${ masseHoraire - MHR } heures</span>
                                <div class="module-card">
                                    <div class="progress-bar">
                                        <div class="progress active" style="width: ${(MHR / masseHoraire) * 100 }%;"></div>
                                    </div><br>
                                </div>
                            </div>`
                }
                document.querySelector('#calculeDuree').innerHTML = lines
        })


        
    </script>
    <?php require_once "../../template/footer.php" ?>