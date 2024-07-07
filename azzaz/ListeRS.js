// Déclaration de la variable filteredRapports en dehors de la fonction fetch()
let filteredRapports = [];

// Fonction pour charger et afficher les rapports
function chargerRapports() {
    fetch('Allrapports.php')
        .then(response => response.json())
        .then(rapports => {
            // Filtrer les rapports en fonction de la recherche
            const searchValue = searchInput.value.trim().toLowerCase();
            filteredRapports = rapports.filter(rapport => 
                rapport.titre.toLowerCase().includes(searchValue)
            );

            RapportsContainer.innerHTML = '';
            let rapportTableHTML = `
                <table class='rapport-table'>
                    <thead>
                        <tr>
                            <th class='table-header'>Titre</th>
                            <th class='table-header'>Description</th>
                            <th class='table-header'>Date</th>
                            <th class='table-header'>Chemin</th>
                            <th class='table-header'>Nom Etudiant</th>
                            <th class='table-header'>Prénom Etudiant</th>
                            <th class='table-header'>Filière</th>
                            <th class='table-header'>Niveau</th>
                            <th class='table-header'>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            filteredRapports.forEach(rapport => {
                rapportTableHTML += `
                    <tr class='table-row'>
                        <td class='table-data'>${rapport.titre}</td>
                        <td class='table-data'>${rapport.description}</td>
                        <td class='table-data'>${rapport.date}</td>
                        <td class='table-data'>${rapport.Chemin}</td>
                        <td class='table-data'>${rapport.Nom_Etu}</td>
                        <td class='table-data'>${rapport.Prénom_Etu}</td>
                        <td class='table-data'>${rapport.Nom_filière}</td>
                        <td class='table-data'>${rapport.Nom_niveau}</td>
                        <td class='table-data'>
                            <a href='${rapport.Chemin}' download>Télécharger</a>
                        </td>
                    </tr>
                `;
            });

            rapportTableHTML += `
                    </tbody>
                </table>
            `;
            RapportsContainer.innerHTML = rapportTableHTML;

        })
        .catch(error => console.error('Erreur lors de la récupération des rapports :', error));
}

// Appeler la fonction pour charger et afficher les rapports au chargement de la page
chargerRapports();
