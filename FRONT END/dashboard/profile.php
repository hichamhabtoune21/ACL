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
                                        <a class="nav-link active" href="#"><i
                                                class="bi bi-person-square"></i></i>Profile</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-10 col-lg-10 col-xl-10" style="padding:25px">
                    <h3 style="padding-bottom:25px">YOUR PROFILE</h3>
                    <?php
                    $query = "SELECT * FROM user WHERE ID_User=" . $_SESSION['ID_User'];

                    $result = mysqli_query($connect, $query);
                    $user = mysqli_fetch_array($result);
                    ?>

                    <div class="form-group w-50">
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name" value="<?=$user["Name"]?>" required>
                        </div>
                    </div>


                    <div class="form-group w-50">
                        <div class="mb-3">
                            <label for="inputSurname" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="inputSurname" name="surname" value="<?=$user["Surname"]?>" required>
                        </div>
                    </div>

                    <div class="form-group w-50">
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="username" value="<?=$user["Username"]?>" required>
                        </div>
                    </div>

                    <div class="form-group w-50">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                aria-describedby="emailHelp" value="<?=$user["Email"]?>" required>
                        </div>
                    </div>

                    <div class="form-group w-50">
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" pattern=".{8,}"
                                oninvalid="this.setCustomValidity('Password must be 8 characters long')" value="<?=$user["Password"]?>" required>
                        </div>
                    </div>

                </div>
            </div>
            <?php

    } else {
        echo "Access denied";
    } ?>
</body>

</html>





</script>

</html>