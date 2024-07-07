var lientitre = document.getElementById("lientitre");
// Récupérer le conteneur des mots-clés
var container = document.getElementById("container");

// Ajouter un écouteur d'événement pour le clic sur le lien
lientitre.addEventListener("click", function(event) {
    // Empêcher le comportement par défaut du lien
    event.preventDefault();
    // Afficher le conteneur des mots-clés
    if (container.style.display === "none") {
        container.style.display = "block";
    } else {
        container.style.display = "none";
    }
});