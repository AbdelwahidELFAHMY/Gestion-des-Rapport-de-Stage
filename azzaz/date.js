var liendate = document.getElementById("liendate");
// Récupérer le conteneur des mots-clés
var dateshower = document.getElementById("dateshower");

// Ajouter un écouteur d'événement pour le clic sur le lien
liendate.addEventListener("click", function(event) {
    // Empêcher le comportement par défaut du lien
    event.preventDefault();
    // Afficher le conteneur des mots-clés
    if (dateshower.style.display === "none") {
        dateshower.style.display = "block";
    } else {
        dateshower.style.display = "none";
    }
});