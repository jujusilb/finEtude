document.addEventListener('DOMContentLoaded', function() {
    const demarrerQuizBtn = document.getElementById('demarrer-quiz');
    const conteneurQuestion = document.getElementById('conteneur-question');
    const ajouterQuestionBtn = document.getElementById('ajouter-question');
    const validerQuestionnaireBtn = document.getElementById('valider-questionnaire');
    const formulaireQuestion = document.getElementById('formulaire-question');
    const typeQuestion = document.getElementById('type-question');
    const reponsesContainer = document.getElementById('reponses-container');
    const validerQuestionBtn = document.getElementById('valider-question');

    let questionType = null;
    let reponses = [];

    demarrerQuizBtn.addEventListener('click', function() {
        demarrerQuizBtn.style.display = 'none';
        conteneurQuestion.style.display = 'block';
    });

    ajouterQuestionBtn.addEventListener('click', function() {
        formulaireQuestion.style.display = 'block';
        typeQuestion.style.display = 'block';
        ajouterQuestionBtn.style.display = 'none';
        validerQuestionnaireBtn.style.display = 'none';
        reponsesContainer.innerHTML = ''; // Effacer les réponses précédentes
        reponses = [];
    });

    typeQuestion.addEventListener('click', function(event) {
        questionType = event.target.id;
        typeQuestion.style.display = 'none';
        reponsesContainer.style.display = 'block';

        if (questionType === 'type-text') {
            ajouterInputReponse('Réponse attendue :');
        }
    });

    reponsesContainer.addEventListener('click', function(event) {
        if (event.target.id === 'ajouter-reponse') {
            let label = (questionType === 'type-checkbox' || questionType === 'type-radio') ? 'Réponse (ajouter # au début pour la bonne réponse) :' : 'Réponse :';
            ajouterInputReponse(label);
        }
    });

    validerQuestionBtn.addEventListener('click', function() {
        // Validation et enregistrement de la question et des réponses (à implémenter avec Symfony)

        formulaireQuestion.style.display = 'none';
        ajouterQuestionBtn.style.display = 'block';
        validerQuestionnaireBtn.style.display = 'block';
    });

    validerQuestionnaireBtn.addEventListener('click', function() {
        // Soumission du formulaire (à implémenter avec Symfony)
    });

    function ajouterInputReponse(label) {
        const input = document.createElement('input');
        input.type = 'text';
        input.placeholder = label;
        reponsesContainer.appendChild(input);

        if (questionType === 'type-checkbox' || questionType === 'type-radio') {
            const ajouterBtn = document.createElement('button');
            ajouterBtn.textContent = 'Ajouter une réponse';
            ajouterBtn.id = 'ajouter-reponse';
            reponsesContainer.appendChild(ajouterBtn);
        }
    }
});