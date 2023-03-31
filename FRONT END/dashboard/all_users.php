<?php
session_start();
include("../../BACK END/connect.php");
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

</head>

<body class="d-flex flex-column" style="min-height: 100vh">

    <?php if (isset($_SESSION["id"]) && isset($_SESSION["ruolo"])) {
        if ($_SESSION["ruolo"] == "Admin") { ?>
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
                        <div class="vh-100">
                            <div class="navbar navbar-dark bg-dark">
                                <div class="align-middle" style="font-size: 18px; padding-left: 18px; padding-top: 20px;">
                                    <ul class="navbar-nav">
                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" aria-current="page" href="admin-dashboard.php"><i
                                                    class="bi bi-house"></i>Home</a>
                                        </li>

                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link active" aria-current="page" href="#"><i
                                                    class="bi bi-people"></i>Users</a>
                                        </li>

                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" href="clients.php"><i
                                                    class="bi bi-journal-check"></i>Clients</a>
                                        </li>
                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" href="invoice.php"><i class="bi bi-bar-chart"></i>Invoices</a>
                                        </li>

                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link" href="#"><i class="bi bi-question-square"></i>Help</a>
                                        </li>
                                        <hr style="width: 200%; background-color: white;">
                                        <li class="nav-item">
                                            <a class="nav-link" href="profile.php"><i
                                                    class="bi bi-person-square"></i></i>Profile</a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-10 col-lg-10 col-xl-10" style="padding:25px">

                        <div class="modal fade" id="exampleModalToggle1" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Are you sure to delete it?
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-target="#exampleModalToggle1" data-bs-toggle="modal">Cancel</button>
                                        <div id="addDeleteButton">
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalToggle1"
                                                onclick="deletUser(<?= $invoice['ID_User'] ?>)">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Are you sure to delete it?
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Cancel</button>
                                        <div id="addDeleteButton">
                                            <button class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalToggle" onclick="changeRole(event)">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>USERS</h3>
                        <div class="overflow-auto" style="padding-top:20px">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Surname</th>
                                        <th scope="col">Role</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = mysqli_query($connect, "SELECT * from user");
                                    if (mysqli_num_rows($result)) {
                                        while ($user = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $user["Email"]; ?>
                                                </td>
                                                <td>
                                                    <?= $user["Password"]; ?>
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
                                                    <select class="form-select form-select-sm" aria-label="Default select example"
                                                        name="role" id=<?= $user["ID_User"]; ?>
                                                        onchange='saveChanges(<?= $user["ID_User"] ?>)'>

                                                        <?php
                                                        if ($user["Role"] == "NULL" || $user["Role"]=="") {
                                                            echo "
                                                        <option value='NULL' selected>No Role</option>
                                                        <option value='Admin'>Admin</option>
                                                        <option value='Commercial'>Commercial</option>
                                                        <option value='Area Manager'>Area Manager</option>
                                                        <option value='Administration'>Administration</option>";
                                                        } elseif ($user["Role"] == "Administration") {
                                                            echo "
                                                            <option value='Admin'>Admin</option>
                                                            <option value='Commercial'>Commercial</option>
                                                            <option value='Area Manager'>Area Manager</option>
                                                            <option selected value='Administration'>Administration</option>";
                                                        } elseif ($user["Role"] == "Admin") {
                                                            echo "
                                                            <option selected value='Admin'>Admin</option>
                                                            <option value='Commercial'>Commercial</option>
                                                            <option value='Area Manager'>Area Manager</option>
                                                            <option value='Administration'>Administration</option>";
                                                        } elseif ($user["Role"] == "Commercial") {
                                                            echo "
                                                            <option value='Admin'>Admin</option>
                                                            <option selected value='Commercial'>Commercial</option>
                                                            <option value='Area Manager'>Area Manager</option>
                                                            <option value='Administration'>Administration</option>";
                                                        } elseif ($user["Role"] == "Area Manager") {
                                                            echo "
                                                            <option value='Admin'>Admin</option>
                                                            <option value='Commercial'>Commercial</option>
                                                            <option selected value='Area Manager'>Area Manager</option>
                                                            <option value='Administration'>Administration</option>";


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
                                                        <select class="form-select form-select-sm" aria-label="Default select example"
                                                            id='<?= $user['ID_User'] ?>_area'
                                                            onchange='saveChanges(<?= $user["ID_User"] ?>)'>
                                                            <?php
                                                            if ($user['Area'] == "North-West") {
                                                                echo "
                                                            <option selected value'North-West'>North-West</option>
                                                            <option value='North-East'>North-East</option>
                                                            <option value='Center'>Center</option>
                                                            <option value='South'>South</option>
                                                            <option value='NULL'>No Area</option>";
                                                            } elseif ($user['Area'] == "North-East") {
                                                                echo "
                                                            <option value='North-West'>North-West</option>
                                                            <option selected value='North-East'>North-East</option>
                                                            <option value='Center'>Center</option>
                                                            <option value='South'>South</option>
                                                            <option value='NULL'>No Area</option>";
                                                            } elseif ($user['Area'] == "Center") {
                                                                echo "
                                                            <option value='North-West'>North-West</option>
                                                            <option value='North-East'>North-East</option>
                                                            <option selected value='Center'>Center</option>
                                                            <option value='South'>South</option>
                                                            <option value='NULL'>No Area</option>";
                                                            } elseif ($user['Area'] == "South") {
                                                                echo "
                                                            <option value='North-West'>North-West</option>
                                                            <option value='North-East'>North-East</option>
                                                            <option value='Center'>Center</option>
                                                            <option selected value='South'>South</option>
                                                            <option value='NULL'>No Area</option>"
                                                                ;

                                                            } else {
                                                                echo "
                                                                <option value='North-West'>North-West</option>
                                                                <option value='North-East'>North-East</option>
                                                                <option value='Center'>Center</option>
                                                                <option value='South'>South</option>
                                                                <option selected value='NULL' selected>No Area</option>
                                                                ";
                                                            } ?>
                                                        </select>
                                                        <?php
                                                    } else {


                                                        ?>
                                                        <select class="form-select form-select-sm" aria-label="Default select example"
                                                            id='<?= $user['ID_User'] ?>_area' style="display: none"
                                                            onchange='saveChanges(<?= $user["ID_User"] ?>)'>
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
                                                    <button type="button" class="btn btn-danger" data-bs-toggle='modal'
                                                        href='#exampleModalToggle1'
                                                        onclick='deleteUser(<?= $user["ID_User"] ?>)'>Delete</button>

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
                            <button type='button' class='btn btn-outline-info' data-bs-toggle='modal'
                                href='#exampleModalToggle'>Save</button>
                        </div>



                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Access denied";
    } ?>

</body>
<script>
    var save = false;

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
                success: function (response) {
                    console.log(response);

                    //alert("oooo");
                },
                error: function () {
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
            userModified.push({ 'id': id, 'role': role, 'area': area });
        }



    }

</script>

</html>