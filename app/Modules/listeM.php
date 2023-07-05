<?php require_once '../../template/header.php'; ?>
<body>
  <?php require_once '../../template/navbar.php'; ?>
  <div class="ajouterModule">
    <button name="ajt" id="btn-module" onclick="goTo('http://localhost/taher/app/Modules/ajouterM.php')">
      <i id="symbol" class="fas fa-plus"></i> Ajouter Module
    </button>
  </div>
  <div class="container">
    <div class="row header">
      <h3><i class="fas fa-list"></i> Liste des Modules Réalisés</h3>
    </div>
    <ul id="listModule" class="module-list"></ul>
    <script>
      getData("http://localhost/taher/api.php?query=listeModul").then(function(data) {
        var lines = "";
        console.log(data);
        i = 1
        for (const { libelle } of data) {
          lines += `<li class="list-li">${i++}-${libelle}</li>`;
        }
        document.querySelector('#listModule').innerHTML = lines;
      });
    </script>
  </div>
<?php require_once "../../template/footer.php" ?>
