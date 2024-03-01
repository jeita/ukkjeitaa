<?php
include "koneksi.php";

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class=" --bs-pink:">
    <nav style="background: #e3b3b3;" class="sb-topnav navbar navbar-expand navbar-dark shadow-lg">
        <a class="navbar-brand ps-3 fw-bold text-light" href="index.html">
            PERPUSTAKAAN
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-dark" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav style="background: #e3b3b3;" class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-dark">Core</div>
                        <a class="nav-link text-dark" href="?">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-dark"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading text-dark">Navigasi</div>
                        <?php
                        if ($_SESSION['user']['level'] != 'peminjaman') {
                        ?>
                            <a class="nav-link text-dark" href="?page=Kategori">
                                <div class="sb-nav-link-icon"><i class="fas fa-table text-dark"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link text-dark" href="?page=buku">
                                <div class="sb-nav-link-icon"><i class="fas fa-book text-dark"></i></div>
                                buku
                            <?php
                        } else {
                            ?>
                                <a class="nav-link text-dark" href="?page=ulasan">
                                    <div class="sb-nav-link-icon"><i class="fas fa-comment text-dark"></i></div>
                                    ulasan
                                </a>
                                <a class="nav-link text-dark" href="?page=koleksi&id=<?= $_SESSION["user"]["user_id"]; ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book text-dark"></i></div>
                                    koleksi
                                </a>
                            <?php
                        }
                            ?>
                            <?php
                            if ($_SESSION['user']['level'] != 'peminjaman') {
                            ?>
                                <a class="nav-link text-dark" href="?page=laporan">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book text-dark"></i></div>
                                    Laporan Peminjaman
                                </a>
                            <?php
                            } else {
                            ?>
                                <a class="nav-link text-dark" href="?page=peminjaman">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book text-dark"></i></div>
                                    Peminjaman
                                </a>
                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['user']['level'] == 'admin') {
                            ?>
                                <a class="nav-link text-dark" href="?page=data_user">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book text-dark"></i></div>
                                    Data Peminjam
                                </a>
                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['user']['level'] == 'admin') {
                            ?>
                                <a class="nav-link text-dark" href="?page=data_petugas">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book text-dark"></i></div>
                                    Data Petugas
                                </a>
                            <?php
                            }
                            ?>
                            <a class="nav-link text-dark" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-power-off text-dark"></i></div>
                                Logout
                            </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION['user']['namalengkap']; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php

                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                    if (file_exists($page . '.php')) {
                        include $page . '.php';
                    } else {
                        include '404.php';
                    }
                    ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; perpustakaan digital 2024</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>