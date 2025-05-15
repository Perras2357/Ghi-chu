document.addEventListener('DOMContentLoaded', function () {
  // Masque pour la date : insère automatiquement les '/'
  const naissance = document.getElementById('naissance');
  naissance.addEventListener('input', e => {
    let v = e.target.value.replace(/\D/g, '').slice(0, 8);
    if (v.length > 4) v = v.slice(0, 4) + '/' + v.slice(4);
    if (v.length > 7) v = v.slice(0, 7) + '/' + v.slice(7);
    e.target.value = v;
  });

  // Récupération du formulaire et de ses inputs
  const form = document.getElementById('inscriptionForm');
  const inputs = form.querySelectorAll('input[name]');

  // Fonction de validation d'un seul input
  function validateInput(input) {
    let isValid = true;
    let errorMessage = '';

    // Prénom / Nom
    if (input.name === 'prenom' || input.name === 'nom') {
      if (!input.value.trim()) {
        isValid = false;
        errorMessage = 'Ce champ est obligatoire.';
      }
    }

    // Mot de passe
    if (input.name === 'password' && input.value.length < 6) {
      isValid = false;
      errorMessage = 'Le mot de passe doit comporter au moins 6 caractères.';
    }
    if (input.name === 'password_confirm' &&
        input.value !== form.querySelector('[name=password]').value) {
      isValid = false;
      errorMessage = 'Les deux mots de passe doivent correspondre.';
    }

    // Email
    if (input.name === 'email') {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(input.value.trim())) {
        isValid = false;
        errorMessage = 'Adresse email invalide.';
      }
    }

    // Date de naissance
    if (input.name === 'naissance') {
      const val = input.value.trim();
      if (val === '') {
        isValid = false;
        errorMessage = 'La date de naissance est obligatoire.';
      } else {
        const datePattern = /^[0-9]{4}\/(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])$/;
        if (!datePattern.test(val)) {
          isValid = false;
          errorMessage = 'Le format doit être AAAA/MM/JJ (ex : 2024/03/07).';
        }
      }
    }

    // Gestion de l'affichage de l'erreur
    const group = input.closest('.field-group');
    const errorElement = group.querySelector('.error-message');
    if (!isValid) {
      group.classList.add('error');
      if (errorElement) errorElement.textContent = errorMessage;
    } else {
      group.classList.remove('error');
      if (errorElement) errorElement.textContent = '';
    }

    return isValid;
  }

  // Validation en temps réel
  inputs.forEach(input => {
    input.addEventListener('blur', () => validateInput(input));
    input.addEventListener('input', () => {
      if (input.closest('.field-group').classList.contains('error')) {
        validateInput(input);
      }
    });
  });

  // Validation globale au submit
  form.addEventListener('submit', function (event) {
    let isFormValid = true;
    inputs.forEach(input => {
      if (!validateInput(input)) isFormValid = false;
    });
    if (!isFormValid) {
      event.preventDefault();
    }
  });
});
