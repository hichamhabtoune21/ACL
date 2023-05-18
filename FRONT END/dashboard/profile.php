<?php
//session_start();
include("../../BACK END/connect.php");
require "../../BACK END/translation/init.php";

?>
<!doctype html>
<html>

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.5.0/css/flag-icon.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../../BACK END/translation/update_language.js"></script>

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #2B3036;
            color: white;
        }

        i {
            padding-right: 10px;
        }

        .modal-backdrop {
            background-color: black;

        }

        .modal-content {
            background-color: white;
            color: #fff;
            border: none;
        }

        .modal-header {
            background-color: #2B3036;
            color: #fff;
        }

        .close {
            background-color: white;

            color: #fff;
        }

        .modal-body {
            background-color: white;
            color: black;

        }

        .modal-footer {
            background-color: white;
            color: #fff;

        }

        .modal a {
            color: black;
        }

        select.form-select {
            background-color: #333;
            color: #fff;
            border-color: #666;
        }

        /* Stile per l'elemento "form-select" */


        /* Stile per l'opzione selezionata dell'elemento "form-select" */
        select.form-select option:checked {
            background-color: #666;
            color: #fff;
        }



        /* Stile per il bordo dell'elemento "form-select" quando ha lo stato di focus */
        select.form-select:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            border-color: #fff;
            outline: none;
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
                                        <a class="nav-link" aria-current="page" href="home.php"><i
                                                class="bi bi-house"></i><?=$translator->trans('Home')?></a>
                                    </li>

                                    <?php
                                    if (isset($_SESSION["ruolo"])) {
                                        ?>
                                        <?php
                                        if ($_SESSION["ruolo"] == "Admin") {
                                            ?>
                                            <li class="nav-item" style="padding-bottom: 20px;">
                                                <a class="nav-link" aria-current="page" href="all_users.php"><i
                                                        class="bi bi-people"></i><?=$translator->trans('Users')?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" href="clients.php"><i
                                                    class="bi bi-journal-check"></i><?=$translator->trans('Clients')?></a>
                                        </li>
                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" href="invoice.php"><i class="bi bi-bar-chart"></i><?=$translator->trans('Invoices')?></a>
                                        </li>
                                        <?php
                                    }
                                    ?>

                                    <li class="nav-item" style="padding-bottom: 20px;">
                                        <a class="nav-link" href="#"><i class="bi bi-question-square"></i><?=$translator->trans('Help')?></a>
                                    </li>
                                    <hr style="width: 120%; background-color: white;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#"><i
                                                class="bi bi-person-square"></i></i><?=$translator->trans('Profile')?></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="mt-auto position-sticky bottom-0 p-2 bg-dark">
                            <div class="dropdown d-inline-block me-3">
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


                </div>
                <div class="col-md-10 col-lg-10 col-xl-10" style="padding:25px">
                    <h3 style="padding-bottom:25px"><?=$translator->trans('YOUR PROFILE')?></h3>


                    <form>
                        <div id="<?= $_SESSION["ID_User"] ?>"></div>
                        <?php
                        $query = "SELECT * FROM user WHERE ID_User=" . $_SESSION['ID_User'];

                        $result = mysqli_query($connect, $query);
                        $user = mysqli_fetch_array($result);
                        ?>
                        <form id="novalidate">
                            <div class="form-group w-50">
                                <div class="mb-3">
                                    <label for="inputName" class="form-label"><?=$translator->trans('Name')?></label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                        value="<?= $user["Name"] ?>" required>
                                </div>
                            </div>


                            <div class="form-group w-50">
                                <div class="mb-3">
                                    <label for="inputSurname" class="form-label"><?=$translator->trans('Surname')?></label>
                                    <input type="text" class="form-control" id="inputSurname" name="surname"
                                        value="<?= $user["Surname"] ?>" required>
                                </div>
                            </div>

                            <div class="form-group w-50">
                                <div class="mb-3">
                                    <label for="inputUsername" class="form-label"><?=$translator->trans('Username')?></label>
                                    <input type="text" class="form-control" id="inputUsername" name="username"
                                        value="<?= $user["Username"] ?>" required>
                                </div>
                            </div>

                            <div class="form-group w-50">
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label"><?=$translator->trans('Email address')?></label>
                                    <input type="email" class="form-control" id="inputEmail" name="email"
                                        aria-describedby="emailHelp" value="<?= $user["Email"] ?>" required>
                                </div>
                            </div>

                            <div class="form-group w-50">
                                <div class="mb-3">
                                    <label for="inputPassword" class="form-label"><?=$translator->trans('Password')?></label>
                                    <input type="password" class="form-control" id="inputPassword" name="password"
                                        pattern=".{8,}"
                                        oninvalid="this.setCustomValidity('Password must be 8 characters long')"
                                        value="<?= $user["Password"] ?>" required>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex flex-row bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <form action="../../BACK END/logout.php" method="POST">
                                    <button type='submit' class='btn btn-outline-danger'
                                        formnovalidate="novalidate"><?=$translator->trans('Logout')?></button>
                                </form>
                            </div>
                            <div class="p-2 bd-highlight">
                                <div id="saveButton" style="display: none">
                                    <button type='button' class='btn btn-outline-info' data-bs-toggle='modal'
                                        href='#exampleModalToggle'><?=$translator->trans('Save')?></button>
                                </div>
                            </div>


                        </div>



                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel"><?=$translator->trans('Are you sure to delete it?')?>
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><?=$translator->trans('Cancel')?></button>
                                        <div>
                                            <button class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalToggle"
                                                onclick='changeProfile(<?= $_SESSION["ID_User"] ?>,event)'><?=$translator->trans('Save')?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php

    } else {
        echo "Access denied";
    } ?>
</body>

</html>

<script>
    var save = false;
    var userModified = [];

    function changeProfile(id, event) {
        event.preventDefault();
        const name = $('#inputName').val();
        const surname = $('#inputSurname').val();
        const email = $('#inputEmail').val();
        const password = $('#inputPassword').val();
        const username = $('#inputUsername').val();
        save = false;
        document.getElementById("saveButton").style.display = 'none';
        $.ajax({
            type: "POST",
            url: '../../BACK END/changeProfile.php',
            data: {
                ID_User: id,
                name: name,
                surname: surname,
                email: email,
                password: password,
                username: username
            },
            success: function (response) {
                console.log(response);
            }
        })
    }

    $('#inputName, #inputSurname,#inputUsername,#inputEmail,#inputPassword').on('input', saveChanges);


    function saveChanges() {
        if (!save) {
            save = true;
            document.getElementById("saveButton").style.display = 'block';

        }

    }


</script>

</html>