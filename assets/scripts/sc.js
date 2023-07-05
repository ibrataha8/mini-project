
function showConfirmation(event) {
  event.preventDefault(); // Empêche la soumission du formulaire
  Swal.fire({
    title: 'Confirmation de suppression',
    text: 'Êtes-vous sûr de vouloir supprimer ?',
    icon: 'error',
    showCancelButton: true,
    confirmButtonText: 'Oui, supprimer',
    cancelButtonText: 'Annuler'
  }).then((result) => {
    if (result.isConfirmed) {
      // Ajoutez ici le code pour effectuer la suppression
      // Par exemple, vous pouvez envoyer une requête AJAX pour supprimer les données du serveur
      Swal.fire(
        'Supprimé!',
        'La suppression a été effectuée avec succès.',
        'success'
      ).then(() => {

        var form = document.getElementById('myForm');
          // Utilisez document.querySelector() pour sélectionner le formulaire
          var button = event.target;
        
          // Récupérer la valeur du bouton
          var buttonValue = button.value;
        
          // Ajouter la valeur du bouton à l'URL du formulaire
          var formAction = form.action + '?codeS=' + encodeURIComponent(buttonValue);
        
          // Définir la nouvelle URL du formulaire
          form.action = formAction;
        
          // Soumettre le formulaire
          form.submit();        });
    } else {
      Swal.fire(
        'Annuler!',
        'La suppression a été annulée.',
        'info'
      );
    }
  });
}


function showConfirmation2(event) {
  event.preventDefault(); // Empêche la soumission du formulaire
  Swal.fire({
    title: 'Confirmation de Validation',
    text: 'Êtes-vous sûr de vouloir valider ?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Oui, valider',
    cancelButtonText: 'Annuler'
  }).then((result) => {
    if (result.isConfirmed) {
      // Ajoutez ici le code pour effectuer la suppression
      // Par exemple, vous pouvez envoyer une requête AJAX pour supprimer les données du serveur
      Swal.fire(
        'Valider!',
        'La validation a été effectuée avec succès.',
        'success'
      ).then(() => {
        var form = document.getElementById('myForm');
        var buttonValue = event.target.value;
        var codeS = buttonValue.split(' ')[0];
        var numAff = buttonValue.split(' ')[1];
        var formAction = form.action + '?codeS=' + encodeURIComponent(codeS) + '&numAff=' + encodeURIComponent(numAff);
        form.action = formAction;
  
        form.submit(); // Soumettre le formulaire
        
        });
    } else {
      Swal.fire(
        'Annuler!',
        'La validation a été annulée.',
        'info'
      );
    }
  });
}

  // Code De Filtrage
  document.getElementById("filterInput").addEventListener("input", function() {
    var filterValue = this.value.toLowerCase();
    var rows = document.querySelector("tbody").rows;
    for (var i = 0; i < rows.length; i++) {
      var moduleCell = rows[i].cells[1];
      var moduleText = moduleCell.textContent.toLowerCase();
      if (moduleText.includes(filterValue)) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  });