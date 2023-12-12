<?php
include '../control/ReclamController.php';

// Créer une instance du contrôleur
$reclamController = new ReclamController();

// Récupérer la liste des événements depuis la base de données
$reclams = $reclamController->listReclams();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gymbros</title>   
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

</head>

<body>

    <div class="sidebar" id="sidebar" onmouseover="expandSidebar()" onmouseout="collapseSidebar()">
        <div class="logo">
            <img src="aa.png" alt="Logo" height="96" width="126">
        </div>
        <div class="links">
        <a href="liste.php">admin gestion_client</a>
        <a href="admin.php">admin gestion_commande</a>
        <a href="admine.php">admin gestion_forum</a>
        <a href="reclamations.php">admin gestion_reclamation</a>
        <a href="update_delete_demandes.php">admin gestion_coaching</a>
        <a href="ajoutadmine.php">ajout admin</a>
    </div>
    </div>

    <div class="content">
        <div class="container mt-5">
            <a href="http://localhost/gestionreclamation/view/frontoffice/addReclamation.php">Ajouter une Nouvelle reclamation</a>
            <h2>Liste des Réclamations</h2>

            <table class="table table-striped table-bordered" id="hopitalTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th onclick="sortTable(0)">Date <span id="sortIcon0"></span></th>
                        <th onclick="sortTable(1)">Objet <span id="sortIcon1"></span></th>
                        <th onclick="sortTable(2)">Description <span id="sortIcon2"></span></th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                        <th>Réponse</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Afficher les réclamations
                    foreach ($reclams as $reclam) {
                        echo "<tr>";
                        echo "<td align='center'>{$reclam['date']}</td>";
                        echo "<td align='center'>{$reclam['objet']}</td>";
                        echo "<td align='center'>{$reclam['description']}</td>";
                        echo "<td align='center'><a href='editreclam.php?id={$reclam['id']}' class='btn btn-primary'><i class='fas fa-edit'></i> Modifier</a></td>";
                        echo "<td align='center'><a href='deletereclam.php?id={$reclam['id']}' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette réclamation ?\")' class='btn btn-danger'><i class='fas fa-trash'></i> Supprimer</a></td>";
                        echo "<td align='center'><a href='addreponse.php?idReclam={$reclam['id']}' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i>Ajouter Reponse</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <footer class="footer">
        <!-- Content for the footer goes here -->
    </footer>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
    <script>
        var sortDirection = 1; // 1 for ascending, -1 for descending
        var sortedColumnIndex = -1;

        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("hopitalTable");
            switching = true;

            // Set the sort icon for the selected column
            updateSortIcon(columnIndex);

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;

                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];

                    if (sortDirection == 1) {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (sortDirection == -1) {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }

            // Toggle sort direction
            sortDirection *= -1;
            sortedColumnIndex = columnIndex;
        }

        // Add logic for updating sort icons
        function updateSortIcon(columnIndex) {
            // Reset all sort icons
            for (var i = 0; i <= 5; i++) {
                var icon = document.getElementById("sortIcon" + i);
                if (icon) {
                    icon.innerHTML = "";
                }
            }

            // Set the sort icon for the selected column
            var icon = document.getElementById("sortIcon" + columnIndex);
            if (icon) {
                icon.innerHTML = sortDirection == 1 ? "▲" : "▼";
            }
        }

        function expandSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.width = '250px';
        }

        function collapseSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.width = '130px'; // Adjust this width as needed
        }

        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.width = sidebar.style.width === '250px' ? '50px' : '250px';
        }
    </script>

</body>

</html>