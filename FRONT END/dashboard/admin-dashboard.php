<?php
session_start();
?>
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
        }
        i{
            padding-right: 10px;
        }
    </style>
</head>

<body>


    <div class="container-fluid">
        <div class="row row-space" style="height: 100%;">
            <div class="col-2 bg-dark float-left" style="color: beige; border-top-right-radius: 3%;">

                <h3 style="padding: 20px;">ACL</h3>
                <nav class="navbar navbar-dark bg-dark">
                    <div id="navbarText" style="font-size: 20px; padding-left: 20px;">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item" style="padding-bottom: 20px;">
                                <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house"></i>Home</a>
                            </li>

                            <li class="nav-item" style="padding-bottom: 20px;">
                                <a class="nav-link" aria-current="page" href="../../BACK END/all_users.php"><i class="bi bi-people"></i>Users</a>
                            </li>

                            <li class="nav-item" style="padding-bottom: 20px;">
                                <a class="nav-link" href="#"><i class="bi bi-journal-check"></i>Clients</a>
                            </li>
                            <li class="nav-item" style="padding-bottom: 20px;">
                                <a class="nav-link" href="#"><i class="bi bi-bar-chart"></i>Overview</a>
                            </li>
                            
                            <li class="nav-item" style="padding-bottom: 20px;">
                                <a class="nav-link" href="#"><i class="bi bi-question-square"></i>Help</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            
            <div class="col-10" style="background-color: white;">
                <h1 style="font-size: 50px; padding: 20px;">
                   <?php
                   echo "Welcome " . $_SESSION["username"]; 
                   ?>
                
                </h1>


            </div>
        </div>
    </div>
</body>