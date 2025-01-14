<?php

session_start();
require_once '../config/config.php';

if (!isset($_SESSION['token']) || $_SESSION['token'] !== $_GET['token']) {
    header('Location: ../../index.php');
    exit;
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$bagian = $_SESSION['bagian'];

if ($bagian !== 'MAINTENANCE' && $bagian !== 'MASTER') {
    header('Location: ../../public/indeks.php?token=' . urlencode($_SESSION['token']) . '&error=not_allowed');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance</title>

    <!-- css -->
    <link rel="stylesheet" href="../styles/kalibrasi.css">
    <link rel="stylesheet" href="../components/bootstrap/css/bootstrap.min.css">
    <!-- /css -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="all">
        <div class="header">
            <img src="../assets/BAS_logo.png" alt="">
        </div>

        <!-- navbar -->

        <div class="navbar">

            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </button>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h3 class="offcanvas-title" id="offcanvasScrollingLabel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        <?php echo htmlspecialchars($username); ?>
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <hr>
                <div class="offcanvas-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                        Account
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>ID</td>
                                                <td>:</td>
                                                <td></td>
                                                <td><?php echo htmlspecialchars($id); ?></td>
                                            </tr>
                                            <tr>
                                                <td>USERNAME</td>
                                                <td>:</td>
                                                <td></td>
                                                <td><?php echo htmlspecialchars($username); ?></td>
                                            </tr>
                                            <tr>
                                                <td>ROLE</td>
                                                <td>:</td>
                                                <td></td>
                                                <td><?php echo htmlspecialchars($bagian); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                        if (isset($_GET['action']) && $_GET['action'] === 'logout') {
                            session_unset();
                            session_destroy();
                            header('Location: ../../../index.php');
                            exit;
                        }
                        ?>
                        <li class="list-group-item"><a href="?action=logout" class="link-dark link-underline link-underline-opacity-0">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- page -->

        <div class="fill">
            <div class="dread">
                <div class="crumb">
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="../../public/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="maintenance.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">> MAINTENANCE</a>
                </div>
            </div>
            <div class="page">
                <a href="Maintenance/1-pump/dashboard.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?> " class="link-dark link-underline link-underline-opacity-0">
                    <div class="box">
                        <img src="../assets//maintenance/pump.jpg" alt="pump" width="140px">
                        <div class="name">MOTOR PUMP</div>
                    </div>
                </a>
                <a href="Maintenance/2-utility/dashboard.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>" class="link-dark link-underline link-underline-opacity-0">
                    <div class="box">
                        <img src="../assets//maintenance/utility.jpg" alt="utility" width="140px">
                        <div class="name">UTILILTY</div>
                    </div>
                </a>
                <a href="Maintenance/5-electrical_engine/dashboard.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>" class="link-dark link-underline link-underline-opacity-0">
                    <div class="box">
                        <img src="../assets/maintenance/electrical-engine.png" alt="electrical_engine" width="140px">
                        <div class="name">ELECTRICAL ENGINE</div>
                    </div>
                </a>
            </div>
        </div>

        <!-- js -->
        <script src="script.js"></script>
        <script src="../components/bootstrap/js/bootstrap.min.js"></script>
        <script src="../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>