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
        }

        i {
            padding-right: 10px;
        }

        @media(prefers-reduced-motion: reduce) {
            .collapsing {
                transition-property: height, visibility;
                transition-duration: .999s;
            }
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }

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

</head>

<body class="d-flex flex-column" style="min-height: 100vh">

<?php if(isset($_SESSION["id"]) && isset($_SESSION["ruolo"])){
        if($_SESSION["ruolo"]=="Admin"){?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-dark vh-10 show d-none d-md-block overflow-hidden"
                style="color: white;padding-left: 18px;padding-top: 10px;font-size: 25px; width:100%;">

                <i class="bi bi-bounding-box"></i><span>ACME</span>
            </div>
        </div>
        
        <div class="row bg-dark" >
            <div class="col-md-12 col-lg-12 col-xl-12 bg-dark float-left" style="color: beige;">
                <div class="row d-md-none">

                    <div class="col-12 inline d-flex justify-content-between">


                        <nav class="navbar navbar-dark">
                            <button class="navbar-toggler" data-bs-toggle="collapse" href="#nav" role="button"
                                aria-expanded="true" aria-controls="nav" data-toggle="collapse">
                                <i class="navbar-toggler-icon"></i>
                            </button>
                            <div style="padding-left: 20px;padding-top: 5px;font-size: 25px;">
                                <i class="bi bi-bounding-box"></i><span>ACME</span>
                            </div>

                        </nav>

                    </div>

                   
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2 col-lg-2 col-xl-2 bg-dark collapse show d-md-block text-nowrap"
                style="color: beige; padding-right: 10px; align-items: center;" id="nav">
                <div class="vh-100">
                    <div class="navbar navbar-dark bg-dark">
                        <div class="align-middle" style="font-size: 18px; padding-left: 18px; padding-top: 20px;">
                            <ul class="navbar-nav">
                                <li class="nav-item" style="padding-bottom: 20px;">
                                    <a class="nav-link" aria-current="page"
                                        href="admin-dashboard.php"><i
                                            class="bi bi-house"></i>Home</a>
                                </li>

                                <li class="nav-item" style="padding-bottom: 20px;">
                                    <a class="nav-link active" aria-current="page" href="#"><i
                                            class="bi bi-people"></i>Users</a>
                                </li>

                                <li class="nav-item" style="padding-bottom: 20px;">
                                    <a class="nav-link" href="#"><i class="bi bi-journal-check"></i>Clients</a>
                                </li>
                                <li class="nav-item" style="padding-bottom: 20px;">
                                    <a class="nav-link" href="invoice.php"><i class="bi bi-bar-chart"></i>Invoices</a>
                                </li>

                                <li class="nav-item" style="padding-bottom: 20px;">
                                    <a class="nav-link" href="#"><i class="bi bi-question-square"></i>Help</a>
                                </li>
                                <hr style="width: 200%; background-color: white;">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-person-square"></i></i>Profile</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-10 col-lg-10 col-xl-10" style="background-color: white;">
                <h1 style=" padding-left: 20px;">Users</h1>
                <div class="overflow-auto">
                <table class="table " >
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
                            while($user=mysqli_fetch_array($result)){
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
                                    <td >
                                        <select class="form-select" aria-label="Default select example" name="role" id="role">
                                            <?php
                                            if ($user["Role"] == "NULL") {
                                                echo "
                                                        <option selected>Senza ruolo</option>
                                                        <option value='ad'>Admin</option>
                                                        <option value='commercial'>Commerciale</option>
                                                        <option value='capo'>Capo area</option>
                                                        <option value='amministrazione'>Amministrazione</option>";
                                            } elseif ($user["Role"] == "Amministratore") {
                                                echo "
                                                        <option selected>Amministrazione</option>
                                                        <option value='ad'>Admin</option>
                                                        <option value='commercial'>Commerciale</option>
                                                        <option value='capo'>Capo area</option>";
                                            } elseif ($user["Role"] == "Admin") {
                                                echo "
                                                <option selected>Admin</option>
                                                <option value='commercial'>Commerciale</option>
                                                <option value='capo'>Capo area</option>
                                                <option value='amministrazione'>Amministrazione</option>";
                                            } elseif ($user["Role"] == "Commerciale") {
                                                echo "
                                                <option selected>Commerciale</option>
                                                <option value='ad'>Admin</option>
                                                <option value='capo'>Capo area</option>
                                                <option value='amministrazione'>Amministrazione</option>";
                                            }elseif($user[""])

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
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-danger">Delete</button>

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
}
else{
    echo "Access denied";}?>

</body>
<script>
    /* Storing user's device details in a variable*/
    let details = navigator.userAgent;

    /* Creating a regular expression 
    containing some mobile devices keywords 
    to search it in details string*/
    let regexp = /android|iphone|kindle|ipad/i;

    /* Using test() method to search regexp in details
    it returns boolean value*/
    let isMobileDevice = regexp.test(details);

    const a = ["desktop", "mobile"];
    if (isMobileDevice) {
        //document.write("You are using a Mobile Device");
        //var x = document.getElementById("select").value;



    } else {
        // document.write("You are using Desktop");
        // document.getElementById("nav").classList.add('collapse-horizontal');

    }
    function change() {


    }




</script>

</html>