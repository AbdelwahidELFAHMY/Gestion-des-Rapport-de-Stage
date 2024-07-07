const RapportsContainer = document.getElementById('RapportsContainer');
const searchInput = document.getElementById('searchInput');
const NomSecretaire = document.getElementById('NomSecretaire');

const params = new URLSearchParams(window.location.search);

if (params.has('nom')) {
    NomSecretaire.innerHTML = '';
    NomSecretaire.innerHTML += "Binvenue   <strong>"+ params.get('nom') + "</strong>";

} else {
    console.log("Aucun ID trouvé dans l'URL.");
}

// Fonction pour charger et afficher les rapports
function chargerRapports() {
    fetch('rapports.php')
        .then(response => response.json())
        .then(rapports => {
            // Filtrer les rapports en fonction de la recherche
            const filteredRapports = rapports.filter(rapport => {
                const searchValue = searchInput.value.trim().toLowerCase();
                return rapport.titre.toLowerCase().includes(searchValue);
            });

            RapportsContainer.innerHTML = '';
            let rapportTableHTML = "<table class='rapport-table'><thead><tr><th class='table-header'>Titre</th><th class='table-header'>Description</th><th class='table-header'>Date</th><th class='table-header'>Chemin</th><th class='table-header'>Actions</th></tr></thead><tbody>"; // Commencer le tableau avec les en-têtes
            filteredRapports.forEach(rapport => {
                
                rapportTableHTML += "<tr class='table-row'>"; // Commencer une nouvelle ligne
                rapportTableHTML += "<td class='table-data'>" + rapport.titre + "</td>"; // Ajouter chaque attribut dans une cellule
                rapportTableHTML += "<td class='table-data'>" + rapport.description + "</td>";
                rapportTableHTML += "<td class='table-data'>" + rapport.date + "</td>";
                rapportTableHTML += "<td class='table-data'>" + rapport.Chemin + "</td>";
                // Ajouter une colonne pour les actions avec un bouton de détails et un lien de téléchargement
                rapportTableHTML += "<td class='table-data'><button class='details-btn' data-rapport='" + JSON.stringify(rapport) + "'>Détails</button><a href='" + rapport.Chemin + "' download>Télécharger</a></td>";
                rapportTableHTML += "</tr>"; // Fin de la ligne
            });
            rapportTableHTML += "</tbody></table>"; // Fin du tableau
            RapportsContainer.innerHTML = rapportTableHTML; // Ajouter le tableau au contenu de RapportsList

            // Ajout d'un écouteur d'événements à chaque bouton de détails
            const detailsButtons = document.querySelectorAll(".details-btn");
            detailsButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const rapport = JSON.parse(this.getAttribute('data-rapport'));
                    const rapportId = rapport.ID_rapport;
                    window.location.href = 'detailsRapport.php?id=' + rapportId;
                    
                });
            });
        })
        .catch(error => console.error('Erreur lors de la récupération des rapports :', error));
}

// Appeler la fonction pour charger et afficher les rapports au chargement de la page
chargerRapports();

// Écouteur d'événement pour la recherche
searchInput.addEventListener('input', function() {
    // Déclencher le chargement des rapports à nouveau
    chargerRapports();
});
