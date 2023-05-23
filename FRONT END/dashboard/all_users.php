<?php
//session_start();
include("../../BACK END/connect.php");
require "../../BACK END/translation/init.php";
include "../../BACK END/update_role.php";

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.5.0/css/flag-icon.min.css">

    <script src="../../BACK END/translation/update_language.js"></script>

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


        /*
        .table{
   display: block !important;
   overflow-x: auto !important;
   width: 100% !important;
 }
 */
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

</head>

<body class="d-flex flex-column" style="min-height: 100vh">

    <?php if ((isset($_SESSION["id"]) && isset($_SESSION["ruolo"])) && $_SESSION['ruolo']=="Admin") {
        if ($_SESSION["ruolo"] == "Admin") { ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 bg-dark vh-10 show d-none d-md-block overflow-hidden" style="color: white;padding-left: 18px;padding-top: 10px;font-size: 25px; width:100%;">

                        <i class="bi bi-bounding-box"></i><span>ACME</span>
                    </div>
                </div>

                <div class="row bg-dark">
                    <div class="col-md-12 col-lg-12 col-xl-12 bg-dark float-left" style="color: beige;">
                        <div class="row d-md-none">

                            <div class="col-12 inline d-flex justify-content-between">


                                <nav class="navbar navbar-dark">
                                    <button class="navbar-toggler" data-bs-toggle="collapse" href="#nav" role="button" aria-expanded="true" aria-controls="nav" data-toggle="collapse">
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
                    <div class="col-md-2 col-lg-2 col-xl-2 bg-dark collapse d-md-block text-nowrap" style="color: beige; padding-right: 10px; align-items: center;" id="nav">
                        <div class="vh-100 d-flex flex-column">
                            <div class="navbar navbar-dark bg-dark">
                                <div class="align-middle" style="font-size: 18px; padding-left: 18px; padding-top: 20px;">
                                    <ul class="navbar-nav">
                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" aria-current="page" href="home.php"><i class="bi bi-house"></i>
                                                <?= $translator->trans('Home') ?>
                                            </a>
                                        </li>
                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-people"></i>
                                                <?= $translator->trans('Users') ?>
                                            </a>
                                        </li>
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
                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" href="help.php"><i class="bi bi-question-square"></i>
                                                <?= $translator->trans('Help') ?>
                                            </a>
                                        </li>
                                        <hr style="width: 120%; background-color: white;">
                                        <li class="nav-item">
                                            <a class="nav-link" href="profile.php"><i class="bi bi-person-square"></i></i>
                                                <?= $translator->trans('Profile') ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dropdown d-inline-block me-3" style="padding-left:15px;padding-top:30px;">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                        <li><a class="dropdown-item" href="#" onclick="updateLanguage('it_IT',event)"><i class="flag-icon flag-icon-it"></i> Italiano</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="updateLanguage('en_US',event)"><i class="flag-icon flag-icon-gb"></i> English</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="updateLanguage('es_ES',event)"><i class="flag-icon flag-icon-es"></i> Espanol</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-10 col-lg-10 col-xl-10" style="padding:25px">

                        <div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">
                                            <?= $translator->trans('Are you sure to delete it?') ?>
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-target="#exampleModalToggle1" data-bs-toggle="modal"><?= $translator->trans('Cancel') ?></button>
                                        <div id="addDeleteButton">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">
                                            <?= $translator->trans('Are you sure to save it?') ?>
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><?= $translator->trans('Cancel') ?></button>
                                        <div id="savebtn">
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" onclick="changeRole(event)"><?= $translator->trans('Save') ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>
                            <?= strtoupper($translator->trans('Users')) ?>
                        </h3>
                        <div class="overflow-auto" style="padding-top:20px">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <?= $translator->trans('Email') ?>
                                        </th>
                                        <th scope="col">
                                            <?= $translator->trans('Username') ?>
                                        </th>
                                        <th scope="col">
                                            <?= $translator->trans('Name') ?>
                                        </th>
                                        <th scope="col">
                                            <?= $translator->trans('Surname') ?>
                                        </th>
                                        <th scope="col">
                                            <?= $translator->trans('Role') ?>
                                        </th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = mysqli_query($connect, "SELECT * from user");
                                    if (mysqli_num_rows($result)) {
                                        while ($user = mysqli_fetch_array($result)) {
                                    ?>
                                            <tr id='<?= $user['ID_User']?>-row'>
                                                <td>
                                                    <?= $user["Email"]; ?>
                                                </td>
                                                <td>
                                                    <?= $user["Username"]; ?>
                                                </td>
                                                <td>
                                                    <?= $user["Name"]; ?>
                                                </td>
                                                <td>
                                                    <?= $user["Surname"]; ?>
                                                </td>
                                                <td>
                                                    <select class="form-select form-select-sm" aria-label="Default select example" name="role" id=<?= $user["ID_User"]; ?> onchange='saveChanges(<?= $user["ID_User"] ?>)'>

                                                        <?php
                                                        if ($user["Role"] == "NULL" || $user["Role"] == "") {
                                                            echo "
                                                        <option value='NULL' selected>" . $translator->trans("No Role") . "</option>
                                                        <option value='Admin'>" . $translator->trans("Admin") . "</option>
                                                        <option value='Commercial'>" . $translator->trans("Commercial") . "</option>
                                                        <option value='Area Manager'>" . $translator->trans("Area manager") . "</option>
                                                        <option value='Administration'>" . $translator->trans("Administration") . "</option>";
                                                        } elseif ($user["Role"] == "Administration") {
                                                            echo "
                                                            <option value='Admin'>" . $translator->trans("Admin") . "</option>
                                                            <option value='Commercial'>" . $translator->trans("Commercial") . "</option>
                                                            <option value='Area Manager'>" . $translator->trans("Area manager") . "</option>
                                                            <option selected value='Administration'>" . $translator->trans("Administration") . "</option>";
                                                        } elseif ($user["Role"] == "Admin") {
                                                            echo "
                                                            <option selected value='Admin'>" . $translator->trans("Admin") . "</option>
                                                            <option value='Commercial'>" . $translator->trans("Commercial") . "</option>
                                                            <option value='Area Manager'>" . $translator->trans("Area manager") . "</option>
                                                            <option value='Administration'>" . $translator->trans("Administration") . "</option>";
                                                        } elseif ($user["Role"] == "Commercial") {
                                                            echo "
                                                            <option value='Admin'>" . $translator->trans("Admin") . "</option>
                                                            <option selected value='Commercial'>" . $translator->trans("Commercial") . "</option>
                                                            <option value='Area Manager'>" . $translator->trans("Area manager") . "</option>
                                                            <option value='Administration'>" . $translator->trans("Administration") . "</option>";
                                                        } elseif ($user["Role"] == "Area Manager") {
                                                            echo "
                                                            <option value='Admin'>" . $translator->trans("Admin") . "</option>
                                                            <option value='Commercial'>" . $translator->trans("Commercial") . "</option>
                                                            <option selected value='Area Manager'>" . $translator->trans("Area Manager") . "</option>
                                                            <option value='Administration'>" . $translator->trans("Administration") . "</option>";
                                                        }

                                                        ?>
                                                        <!--
                                                            <option selected>
                                                                <?= $user["Ruolo"] ?>
                                                            </option>

                                                            <option value='ad'>Admin</option>
                                                            <option value='commercial'>Commerciale</option>
                                                            <option value='capo'>Capo area</option>
                                                            <option value='amministrazione'>Amministrazione</option>
                                                        -->
                                                    </select>
                                                    <?php

                                                    if ($user['Role'] == "Area Manager") {
                                                    ?>
                                                        <select class="form-select form-select-sm" aria-label="Default select example" id='<?= $user['ID_User'] ?>_area' onchange='saveChanges(<?= $user["ID_User"] ?>)'>
                                                            <?php
                                                            if ($user['Area'] == "North-West") {
                                                                echo "
        <option selected value='North-West'>" . $translator->trans("North-West") . "</option>
        <option value='North-East'>" . $translator->trans("North-East") . "</option>
        <option value='Center'>" . $translator->trans("Center") . "</option>
        <option value='South'>" . $translator->trans("South") . "</option>
        <option value='NULL'>" . $translator->trans("No Area") . "</option>";
                                                            } elseif ($user['Area'] == "North-East") {
                                                                echo "
        <option value='North-West'>" . $translator->trans("North-West") . "</option>
        <option selected value='North-East'>" . $translator->trans("North-East") . "</option>
        <option value='Center'>" . $translator->trans("Center") . "</option>
        <option value='South'>" . $translator->trans("South") . "</option>
        <option value='NULL'>" . $translator->trans("No Area") . "</option>";
                                                            } elseif ($user['Area'] == "Center") {
                                                                echo "
        <option value='North-West'>" . $translator->trans("North-West") . "</option>
        <option value='North-East'>" . $translator->trans("North-East") . "</option>
        <option selected value='Center'>" . $translator->trans("Center") . "</option>
        <option value='South'>" . $translator->trans("South") . "</option>
        <option value='NULL'>" . $translator->trans("No Area") . "</option>";
                                                            } elseif ($user['Area'] == "South") {
                                                                echo "
        <option value='North-West'>" . $translator->trans("North-West") . "</option>
        <option value='North-East'>" . $translator->trans("North-East") . "</option>
        <option value='Center'>" . $translator->trans("Center") . "</option>
        <option selected value='South'>" . $translator->trans("South") . "</option>
        <option value='NULL'>" . $translator->trans("No Area") . "</option>";
                                                            } else {
                                                                echo "
        <option value='North-West'>" . $translator->trans("North-West") . "</option>
        <option value='North-East'>" . $translator->trans("North-East") . "</option>
        <option value='Center'>" . $translator->trans("Center") . "</option>
        <option value='South'>" . $translator->trans("South") . "</option>
        <option selected value='NULL'>" . $translator->trans("No Area") . "</option>";
                                                            }
                                                            ?>
                                                        </select>

                                                    <?php
                                                    } else {


                                                    ?>
                                                        <select class="form-select form-select-sm" aria-label="Default select example" id='<?= $user['ID_User'] ?>_area' style="display: none" onchange='saveChanges(<?= $user["ID_User"] ?>)'>
                                                            <option selected value='NULL' selected>No Area</option>
                                                            <option value='North-West'>North-West</option>
                                                            <option value='North-East'>North-East</option>
                                                            <option value='Center'>Center</option>
                                                            <option value='South'>South</option>";
                                                        </select>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle='modal' href='#exampleModalToggle1' onclick='addDelete(<?= $user["ID_User"] ?>)'><?= $translator->trans('Delete') ?></button>

                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div id="saveButton" style="display: none">
                            <button type='button' class='btn btn-outline-info' data-bs-toggle='modal' href='#exampleModalToggle'><?= $translator->trans('Save') ?></button>
                        </div>



                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo $translator->trans("Access denied");
    } ?>

</body>
<script>
    var save = false;
    function addDelete(id) {
        document.getElementById("addDeleteButton").innerHTML = "<button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModalToggle1' onclick='deleteUser(" + id + ",event)'><?= $translator->trans('Delete') ?></button>";
    }
    function deleteUser(id,event){
        event.preventDefault();
        var row = document.getElementById(id+'-row');
        row.parentNode.removeChild(row);
        $.ajax({
                type: "POST",
                url: '../../BACK END/deleteUser.php',
                data: {
                    ID_User: id,
                },
                success: function(response) {
                    console.log(response);

                },
                error: function() {
                   alert("failed");
                }

            })
    }
    function changeRole(event) {
        event.preventDefault();
        var role;
        var area;
        for (let i = 0; i < userModified.length; i++) {
            id = userModified[i].id;
            role = userModified[i].role;
            area = userModified[i].area;
            console.log(area);
            $.ajax({
                type: "POST",
                url: '../../BACK END/changeUserRole.php',
                data: {
                    ID_User: id,
                    Role: role,
                    Area: area,

                },
                success: function(response) {
                    console.log(response);
                },
                error: function() {
                    alert("failed");
                }

            })
        }
        document.getElementById("saveButton").style.display = 'none';
        save = false;



    }
    var userModified = [];

    function saveChanges(id) {
        if (!save) {
            save = true;
            document.getElementById("saveButton").style.display = 'block';
        }
        var exists = false;
        var role = document.getElementById(id).value;
        var area;
        if (role == "Area Manager") {
            area = document.getElementById(id + '_area').value;
            document.getElementById(id + '_area').style.display = 'block';
        } else {
            area = "NULL";
            document.getElementById(id + '_area').style.display = 'none';
        }
        for (let i = 0; i < userModified.length; i++) {
            if (userModified[i].id == id) {
                userModified[i].role = role;
                userModified[i].area = area;
                exists = true;
                break;
            }
        }
        if (!exists) {
            userModified.push({
                'id': id,
                'role': role,
                'area': area
            });
        }



    }
</script>

</html>