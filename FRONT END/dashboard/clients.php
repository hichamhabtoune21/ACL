<?php
session_start();
include("../../BACK END/connect.php");
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

</head>

<body class="d-flex flex-column" style="min-height: 100vh">


    <?php if (isset($_SESSION["id"]) && isset($_SESSION["ruolo"])) {
        if ($_SESSION["ruolo"] != 'NULL') { ?>
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
                                        <?php
                                        if ($_SESSION["ruolo"] == "Admin") {
                                            ?>
                                            <li class="nav-item" style="padding-bottom: 20px;">
                                                <a class="nav-link" aria-current="page" href="all_users.php"><i
                                                        class="bi bi-people"></i>Users</a>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                        <li class="nav-item" style="padding-bottom: 20px;">
                                            <a class="nav-link active" href="#"><i class="bi bi-journal-check"></i>Clients</a>
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
                        <h3>CLIENTS</h3>
                        <div class="overflow-auto" style="padding-top:20px">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Surname</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">VAT Number</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "";
                                    if ($_SESSION["ruolo"] == "Admin" || $_SESSION["ruolo"] == "Administration") {
                                        $query = "SELECT * FROM client";
                                    } elseif ($_SESSION["ruolo"] == "Commercial") {
                                        $query = "SELECT * FROM client INNER JOIN user_manage_client ON user_manage_client.ID_Client = client.ID_Client and user_manage_client.ID_User=" . $_SESSION["ID_User"];
                                    } elseif ($_SESSION["ruolo"] == "Area Manager") {
                                        $area = $_SESSION["Area"];
                                        $query = "SELECT * FROM client WHERE Area ='$area'";
                                    }
                                    $result = mysqli_query($connect, $query);
                                    if (mysqli_num_rows($result)) {
                                        while ($client = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $client["Name"]; ?>
                                                </td>
                                                <td>
                                                    <?= $client["Surname"]; ?>
                                                </td>
                                                <td>
                                                    <?= $client["Phone"]; ?>
                                                </td>
                                                <td>
                                                    <?= $client["Address"]; ?>
                                                </td>
                                                <td>
                                                    <?= $client["VAT number"]; ?>
                                                </td>
                                                <td>
                                                    <?= $client["Area"]; ?>
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle='modal'
                                                        href='#exampleModalToggle1'
                                                        onclick='deleteUser(<?= $client["ID_Client"] ?>)'>Delete</button>

                                                </td>
                                            </tr>
                                            <?php
                                        }

                                    }

                                    ?>

                                </tbody>
                            </table>
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

</html>





</script>

</html>