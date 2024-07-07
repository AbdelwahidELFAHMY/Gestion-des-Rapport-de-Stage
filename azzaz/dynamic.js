var btn = document.getElementById("afficherFiliereBtn");
var filiereList = document.getElementById("filiereList");

// Ajouter un gestionnaire d'événements au clic sur le bouton
btn.addEventListener("click", function() {
    // Vérifier si la liste des filières est déjà affichée ou cachée
    if (filiereList.style.display === "none") {
        // Si elle est cachée, l'afficher
        filiereList.style.display = "block";
        filiereList.style.display ="flex";
        filiereList.style.flexDirection ="row";
        filiereList.style.alignContent ="center";
        
    } else {
        // Sinon, la cacher
        filiereList.style.display = "none";
    }
});