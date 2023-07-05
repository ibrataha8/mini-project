<?php require_once '../../template/header.php'; ?>
<?php
session_start();
require_once "../../configDB/connexionBD.php";
$mat = $_SESSION["user"][0]["matricule"];
$sql = "SELECT g.*,a.*,m.*  from groupe as g
            inner join affectation as a on a.matricule = g.matricule
            inner join module as m on a.codeM = m.codeM
            where  a.matricule=?";
$stm = $con->prepare($sql);
$stm->execute(array($mat));
$groupes = $stm->fetchAll();
?>

<body>
  <?php require_once '../../template/navbar.php'; ?>
  <div class="container">
    <h2>Nouvelle Séance</h2>
    <hr>
    <form method="post" action="ajoutSeance.php">
      <div class="form-row">
        <div class="form-group">
          <label for="objS">Objectif Séance</label>
          <textarea name="objS" cols="2" rows="1"></textarea>
        </div>
        <div class="form-group">
          <label for="objS">Type De Cours</label>
          <select name="typeC">
            <option value="">Choissisez le type</option>
            <option value="Présentiel">Séance Présentiel</option>
            <option value="Distanciel">Séance Distanciel</option>
          </select>
        </div>
      </div>

      <hr>
      <div class="form-row">
        <div class="form-group">
          <label for="dateS">Date Séance</label>
          <input type="date" id="dateS" name="dateS">
        </div>
        <div class="form-group">
          <label for="Nombre Abssence">Nombre Abssence</label>
          <select name="stagiaire" id="stagiaire">
            <?php for ($i = 0; $i <= 20; $i++) : ?>
              <option value="<?= $i ?>">(<?= ($i) ?>) stagiares</option>
            <?php endfor ?>
          </select>

        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="heureDepart">Heure Départ Séance</label>
          <select name="heureD"></select>
        </div>
        <div class="form-group">
          <label for="heureFin">Heure Fin Séance</label>
          <select name="heureF"></select>
        </div>
      </div>
      <hr>
      <div class="form-row">
        <div class="form-group">
          <label for="mdl">Nom Du Module</label>
          <select name="mdl">
            <option value="">Choissisez Le Module</option>
            <?php foreach ($groupes as $mdl) : ?>
              <option value="<?= $mdl["codeM"] ?>"><?= $mdl["libelle"] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label for="grp">Groupe</label>
          <select name="grp">
            <option value="">Choisissez un groupe</option>
            <?php for ($i = 0; $i < count($groupes); $i++) : ?>
              <?php $currentValue = $groupes[$i]["codeG"]; ?>
              <?php $valueExists = false; ?>
              <?php for ($j = 0; $j < $i; $j++) : ?>
                <?php if ($groupes[$j]["codeG"] === $currentValue) $valueExists = true; ?>
              <?php endfor ?>
              <?php if (!$valueExists) : ?>
                <option value="<?= $currentValue ?>"><?= $currentValue ?></option>
              <?php endif ?>
            <?php endfor ?>
          </select>
        </div>
      </div>
      <hr>
      <div class="form-group radio-group">
        <label>Type Séance</label>
        <input type="radio" name="typs" value="Cours">Cours
        <input type="radio" name="typs" value="CC">CC
        <input type="radio" name="typs" value="EFM">EFM
      </div><br>
      <button name="send" onclick="showConfirmation(event)">ajouter</button>
  </div>
  </div>
  </form>
  </div>

  <script src="http://localhost/taher/assets/scripts/sweetConfirm.js"></script>
  <script src="http://localhost/taher/assets/scripts/getHours.js"></script>
  </div>
  <?php require_once '../../template/footer.php'; ?>