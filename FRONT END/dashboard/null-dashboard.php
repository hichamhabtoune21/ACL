<?php
session_start();
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
            overflow-x: hidden;
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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

</head>

<body class="d-flex flex-column" style="min-height: 100vh">


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-dark vh-10 show d-none d-md-block overflow-hidden"
                style="color: white;padding-left: 18px;padding-top: 10px;font-size: 25px;">

                <i class="bi bi-bounding-box"></i><span>ACME</span>
            </div>
        </div>

        <div class="row vw-100">
            <div class="col-md-2 col-lg-2 col-xl-2 bg-dark float-left" style="color: beige;">
                <div class="row d-md-none">

                    <div class="col-6 inline d-flex justify-content-between">


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

                    <div class="col-6">
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
                                    <a class="nav-link active" aria-current="page"
                                        href="#"><i
                                            class="bi bi-house"></i>Home</a>
                                </li>
                                
                                <li class="nav-item" style="padding-bottom: 20px;">
                                    <a class="nav-link" href="#"><i class="bi bi-question-square"></i>Help</a>
                                </li>
                                <hr style="width: 120%; background-color: white;">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-person-square"></i></i>Profile</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-10 col-lg-10 col-xl-10" style="background-color: white; padding-left: 20px; padding-top: 20px;">
                <h2>Welcome <?php echo $_SESSION["username"]?></h2>
                <h2>You don't have any role yet</h2>
               



            </div>
        </div>
    </div>

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