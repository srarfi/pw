<?php
include '../../Controller/reponseController.php';

// Créer une instance du contrôleur
$reponseController = new reponseController();

// Récupérer la liste des événements depuis la base de données
$reclams = $reponseController->listReclams();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - Product Detail Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="forum.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="log.png" href="index.html">
                <img src="log.png" alt="GymBros" height="77" width="118">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>

            </div>
    </nav>
    <div class="container mt-5">
        <h2>Liste des Reponses</h2>

        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th onclick="sortTable(0)">Id Reclam <span id="sortIcon0"></span></th>
                    <th onclick="sortTable(1)">Date <span id="sortIcon1"></span></th>
                    <th onclick="sortTable(2)">Objet <span id="sortIcon2"></span></th>
                    <th onclick="sortTable(3)">Description <span id="sortIcon3"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Afficher les réponses
                foreach ($reclams as $reclam) {
                    echo "<tr>";
                    echo "<td>{$reclam['idreclamation']}</td>";
                    echo "<td>{$reclam['date']}</td>";
                    echo "<td>{$reclam['objet']}</td>";
                    echo "<td>{$reclam['description']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
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
            table = document.getElementById("dataTable");
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
            for (var i = 0; i <= 3; i++) {
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