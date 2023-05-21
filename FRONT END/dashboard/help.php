<?php
//session_start();
include("../../BACK END/connect.php");
require "../../BACK END/translation/init.php";

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.5.0/css/flag-icon.min.css">

    <script src="../../BACK END/translation/update_language.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>


    <title>Dashboard</title>

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #2B3036;
            color: white;
        }

        i {
            padding-right: 10px;
        }
    </style>


</head>

<body class="d-flex flex-column" style="min-height: 100vh">


    <?php if (isset($_SESSION["id"])) {
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 bg-dark vh-10 show d-none d-md-block overflow-hidden"
                    style="color: white;padding-left: 18px;padding-top: 10px;font-size: 25px; width:100%;">
                    <i class="bi bi-bounding-box"></i><span>ACME</span>
                </div>
            </div>

            <div class="row bg-dark">
                <div class="col-md-12 col-lg-12 col-xl-12 bg-dark float-left" style="color: beige;">
                    <div class="row d-md-none">

                        <div class="col-12 inline d-flex justify-content-between">


                            <nav class="navbar navbar-dark">
                                <button class="navbar-toggler" data-bs-toggle="collapse" href="#nav" role="button"
                                    aria-expanded="true" aria-controls="nav" data-toggle="collapse">
                                    <i class="navbar-toggler-icon"></i>
                                </button>
                                <div style="padding-left: 20px;margin-top: -5px;font-size: 25px;">
                                    <i class="bi bi-bounding-box"></i><span>ACME</span>
                                </div>

                            </nav>

                        </div>


                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-2 col-lg-2 col-xl-2 bg-dark collapse d-md-block text-nowrap"
                    style="color: beige; padding-right: 10px; align-items: center;" id="nav">
                    <div class="vh-100 d-flex flex-column">
                        <div class="navbar navbar-dark bg-dark">
                            <div class="align-middle" style="font-size: 18px; padding-left: 18px; padding-top: 20px;">
                                <ul class="navbar-nav">
                                    <li class="nav-item" style="padding-bottom: 20px;">
                                        <a class="nav-link" aria-current="page" href="home.php"><i class="bi bi-house"></i>
                                            <?= $translator->trans('Home') ?>
                                        </a>
                                    </li>
                                    <?php
                                    if (isset($_SESSION["ruolo"])) {
                                        ?>
                                        <?php
                                        if ($_SESSION["ruolo"] == "Admin") {
                                            ?>
                                            <li class="nav-item" style="padding-bottom: 20px;">
                                                <a class="nav-link" aria-current="page" href="all_users.php"><i
                                                        class="bi bi-people"></i>
                                                    <?= $translator->trans('Users') ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" href="clients.php"><i class="bi bi-journal-check"></i>
                                                <?= $translator->trans('Clients') ?>
                                            </a>
                                        </li>
                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" href="invoice.php"><i class="bi bi-bar-chart"></i>
                                                <?= $translator->trans('Invoices') ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <li class="nav-item" style="padding-bottom: 20px;">
                                        <a class="nav-link active" href="#"><i class="bi bi-question-square"></i>
                                            <?= $translator->trans('Help') ?>
                                        </a>
                                    </li>
                                    <hr class="w-100" style="width: 120%; background-color: white;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="profile.php"><i class="bi bi-person-square"></i></i>
                                            <?= $translator->trans('Profile') ?>
                                        </a>
                                    </li>
                                </ul>


                            </div>

                        </div>
                        <div class="dropdown d-inline-block me-3" style="padding-left:15px;padding-top:30px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php
                                if ($_SESSION['lang'] == 'en_US') {
                                    $flag = 'gb';
                                } else {
                                    $flag = substr($_SESSION['lang'], 0, 2);
                                }
                                ?>
                                <i id="lingua-icon" class="flag-icon flag-icon-<?= $flag ?>"></i>
                            </button>
                            <ul class="dropdown-menu" style="left: 0;">
                                <li><a class="dropdown-item" href="#" onclick="updateLanguage('it_IT',event)"><i
                                            class="flag-icon flag-icon-it"></i> Italiano</a></li>
                                <li><a class="dropdown-item" href="#" onclick="updateLanguage('en_US',event)"><i
                                            class="flag-icon flag-icon-gb"></i> English</a></li>
                                <li><a class="dropdown-item" href="#" onclick="updateLanguage('es_ES',event)"><i
                                            class="flag-icon flag-icon-es"></i> Espanol</a></li>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-md-10 col-lg-10 col-xl-10" style="padding:25px">
                    <h3 style="font-size: 30px;">
                        <?= $translator->trans('Contact') . ": " ?> admin@admin.com
                    </h3>
                    <?php
                    if (!isset($_SESSION["ruolo"])) {
                        ?>
                        <h2>
                            <?= $translator->trans('You do not have any role yet') ?>
                        </h2>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
        <?php

    } else {
        echo $translator->trans("Access denied");
    } ?>
</body>

</html>