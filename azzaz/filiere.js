var lienfiliere = document.getElementById("lienfiliere");
// Récupérer le conteneur des mots-clés
var filiere = document.getElementById("filiere");

// Ajouter un écouteur d'événement pour le clic sur le lien
lienfiliere.addEventListener("click", function(event) {
    // Empêcher le comportement par défaut du lien
    event.preventDefault();
    // Afficher le conteneur des mots-clés
    if (filiere.style.display === "none") {
        filiere.style.display = "block";
    } else {
        filiere.style.display = "none";
    }
});