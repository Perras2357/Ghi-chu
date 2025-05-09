document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#form");
    const title = document.querySelector("#title_id");
    const content = document.querySelector("#content_id");
    const errorTitle = document.querySelector("#errorTitle");
    const errorContent = document.querySelector("#errorContent");
    const errorForm = document.querySelector("#errorForm");
    const submitBtn = document.querySelector("#submit_id");

    // Fonction de validation globale
    function validateForm() {
        let isValid = true;

        if (title.value.length < 3 || title.value.length > 15) {
            isValid = false;
        }

        if (content.value.length < 3 || content.value.length > 100) {
            isValid = false;
        }

        submitBtn.disabled = !isValid;
    }

    // Contrôle en temps réel pour le titre
    title.addEventListener("input", function () {
        if (title.value.length < 3 || title.value.length > 15) {
            errorTitle.textContent = "Le titre doit contenir entre 3 et 15 caractères";
            errorTitle.style.color = "red";
        } else {
            errorTitle.textContent = "";
        }
        validateForm(); // Appelle la fonction après chaque changement
    });

    // Contrôle en temps réel pour le contenu
    content.addEventListener("input", function () {
        if (content.value.length < 3 || content.value.length > 100) {
            errorContent.textContent = "Le contenu doit contenir entre 3 et 100 caractères";
            errorContent.style.color = "red";
        } else {
            errorContent.textContent = "";
        }
        validateForm();
    });

    // Vérification finale avant envoi
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        let Valider = true;
        errorForm.textContent = "";

        if (title.value.length < 3 || title.value.length > 15) {
            errorTitle.textContent = "Le titre doit contenir entre 3 et 15 caractères";
            errorTitle.style.color = "red";
            Valider = false;
        }

        if (content.value.length < 3 || content.value.length > 100) {
            errorContent.textContent = "Le contenu doit contenir entre 3 et 100 caractères";
            errorContent.style.color = "red";
            Valider = false;
        }

        if (Valider) {
            form.submit();
        } else {
            errorForm.textContent = "Corriger les erreurs avant l'envoi du formulaire";
            errorForm.style.color = "red";
        }
    });

    // Vérification initiale au chargement
    validateForm();
});
