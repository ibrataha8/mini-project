<?php require_once '../../template/header.php'; ?>
<body>
  <?php require_once '../../template/navbar.php'; ?>
  <div class="ajouterSeance">
    <button name="ajt" id="btn-seance" onclick="goTo('http://localhost/taher/app/Seances/ajouter.php')">
      <i id="symbol" class="fas fa-plus"></i> Ajouter Séance
    </button>
  </div>
  <div class="container">
    <div class="row header" style="text-align:center;color:green">
      <h3><i class="fas fa-list"></i> Liste Séance Réaliser</h3>
    </div>
    <div class="filter-input">
      <i class="fas fa-search"></i>
      <input type="text" id="filterInput" placeholder="Filtrer par module...">
    </div>
    <form action="supp.php" id="myForm" method="post">
      <table id="example">
        <thead>
          <tr>
            <th>Status</th>
            <th>Module</th>
            <th>Date</th>
            <th>Groupe</th>
            <th>Heure Départ</th>
            <th>Heure Fin</th>
            <th>Durée</th>
            <th>Confirmation</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </form>
    <script>
      getData("http://localhost/taher/api.php?query=listFormateurs").then(function(data) {
        lines = ""
        console.log(data[0]["heureD"])
        console.log(data[0]["heureF"])
        console.log(data)
        for (const {
            valid,
            libelle,
            dateS,
            codeG,
            heureD,
            heureF,
            heureS,
            codeS,
            numAff
          }
          of data) {
          lines += `<tr style="text-align: center;">${valid=='0'?'<td style="color: #708090;">En Attente <i class="fas fa-exclamation-circle"></i></i></td>':'<td style="color: green;">Validée <i class="fas fa-check"></td>'}
          <td>${libelle}</td>
              <td>${dateS}</td>
              <td>${codeG}</td>
              <td>${heureD.slice(0, 5)}</td>
              <td>${heureF.slice(0, 5)}</td>
              <td>${heureS.slice(-2)} Heure</td>
              <td>
                <button id="valid" name="vald" onclick="showConfirmation2(event)" value="${codeS} ${numAff}V"><i class="fas fa-check"></i></button>
                <button id="supp" name="supprimer" onclick="showConfirmation(event)" value="${codeS}S"><i class="fas fa-trash"></i> </button>
              </td>
              </tr>
          `;
        }
        document.querySelector('tbody').innerHTML = lines;
      });
    </script>
    <script src="http://localhost/taher/assets/scripts/sc.js"></script>

  </div>
  <?php require_once "../../template/footer.php" ?>