<?php

use app\core\Application;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        VBIS 2024/2025
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet"/>

    <link rel="stylesheet" href="../assets/js/plugins/toastr/toastr.min.css">
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/plugins/toastr/toastr.min.js"></script>
    <script src="../assets/js/plugins/toastr/toastr-options.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
</head>

<body class="g-sidenav-show   bg-gray-100">
<div class="min-height-300 bg-dark position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
       id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/"
           target="_blank">
            <img src="../assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100"
                 alt="main_logo">
            <span class="ms-1 font-weight-bold"> VBIS 2024/2025</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="/">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </li>
            <?php
            if (Application::$app->session->isInRole('Korisnik')) {
                echo '
                    <li class="nav-item">
                        <a class="nav-link " href="/servicesForUser">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">List of reservations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/myReports">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">My Reports</span>
                        </a>
                    </li>
                ';
            }

            if (Application::$app->session->isInRole('Administrator')) {
                echo '
                    <li class="nav-item">
                        <a class="nav-link " href="/users">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/services">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-folder-17 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/servicesForUser">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">List of reservations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/myReports">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">My Reports</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/adminReports">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-chart-pie-35 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Admin Reports</span>
                        </a>
                    </li>
                ';
            }
            ?>

            <li class="nav-item">
                <a class="nav-link " href="/processLogout">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-user-run text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="../assets/img/illustrations/icon-documentation.svg"
                 alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
            </div>
        </div>
    </div>
</aside>
<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        {{ RENDER_SECTION }}
    </div>
</main>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

<?php
Application::$app->session->showSuccessNotification();
Application::$app->session->showErrorNotification();
?>

</html>