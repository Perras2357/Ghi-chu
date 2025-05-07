document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input');
    
    // Fonction de validation
    function validateInput(input) {
        let isValid = true;
        let errorMessage = '';

        // Validation du mot de passe (doit contenir au moins 8 caractères)
        if (input.name === 'password' && input.value.length < 8) {
            isValid = false;
            errorMessage = 'Le mot de passe doit comporter au moins 8 caractères.';
        }

        // Validation de l'email (format simple)
        if (input.name === 'email' && !/^[^ ]+@[^ ]+\.[a-z]{2,3}$/.test(input.value)) {
            isValid = false;
            errorMessage = 'L\'email n\'est pas valide.';
        }

        // Si le champ est invalide, applique la classe 'invalid' et montre le message d'erreur
        if (!isValid) {
            input.classList.add('invalid');
            const errorElement = input.nextElementSibling; // Le message d'erreur juste après l'input
            if (errorElement && errorElement.classList.contains('error-message')) {
                errorElement.textContent = errorMessage; // Affiche le message d'erreur
            }
        } else {
            input.classList.remove('invalid');
            const errorElement = input.nextElementSibling;
            if (errorElement && errorElement.classList.contains('error-message')) {
                errorElement.textContent = ''; // Retire le message d'erreur
            }
        }

        return isValid;
    }

    // Écouteurs d'événements pour la validation en temps réel
    inputs.forEach(input => {
        input.addEventListener('blur', () => {
            validateInput(input); // Valider lorsqu'on quitte le champ
        });

        input.addEventListener('input', () => {
            if (input.classList.contains('invalid')) {
                validateInput(input); // Réévaluer si l'utilisateur continue de saisir
            }
        });
    });

    // Validation de tout le formulaire lors de la soumission
    form.addEventListener('submit', function (event) {
        let isFormValid = true;
        inputs.forEach(input => {
            if (!validateInput(input)) {
                isFormValid = false;
            }
        });
        if (!isFormValid) {
            event.preventDefault(); // Empêche l'envoi du formulaire si des erreurs existent
        }
    });
});
