function showConfirmation(event) {
    event.preventDefault(); 
    console.log('kkkk')
    Swal.fire({
      title: 'Nouvelle Séance',
      text: 'Etes-vous sûr de vouloir valider la séance?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui, ajouter',
      cancelButtonText: 'Annuler'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Ajouté!',
          'La séance a été ajoutée avec succès.',
          'success'
        ).then(() => {
          // Utilisez document.querySelector() pour sélectionner le formulaire
          document.querySelector('form').submit();
        });
      } else {
        Swal.fire(
          'Annuler!',
          'La séance a été annulée.',
          'info'
        );
      }
    });
  }