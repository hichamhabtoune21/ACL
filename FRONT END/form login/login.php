<?php
require "../../BACK END/translation/init.php";
?>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styleLogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.5.0/css/flag-icon.min.css">

    <script src="../../BACK END/translation/update_language.js"></script>
    <title>Login Page</title>

    <script>

        function checkLogin() {

            let errors = "";
            let checkErrors = false;

            for (var key in inputLogin) {
                if (isEmpty(inputLogin[key])) {
                    errors += inputLogin[key] + " empty\n";
                    checkErrors = true;
                }
            }

            if (checkErrors) {
                alert(errors);
            }
        }

        function isEmpty(x) {
            return (document.getElementById(x).value == "" || document.getElementById(x).value == null);

        }
    </script>
</head>

<body class="d-flex flex-column" style="min-height: 100vh">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 25px;"> <i class="bi bi-bounding-box"></i><span
                    style="padding-left: 10px;">ACME</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <?= $translator->trans("Login") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../form signup/signup.php">
                            <?= $translator->trans("Signup") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../others/about page.php">
                            <?= $translator->trans("About") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:3000/api-docs">API</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="flex: 1 0 auto">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="col-md-6 col-lg-6 " style="padding: 60px;">
            <img src="https://www.mortenhansen.com/wp-content/uploads/2018/09/quiz-intro-image-2000x1720.png"
                class="img-fluid d-block mx-auto" style="max-width: 100%; height: auto;" alt="...">
            </div>
            <div class="col-md-6 col-lg-6">
                <h1 style="font-size: 50px; padding-bottom: 50px;">
                    <?= $translator->trans("Login") ?>
                </h1>
                <div id="problems"></div>

                <form id="form1" method="post">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">
                                <?= $translator->trans("Email address") ?>
                            </label>
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                aria-describedby="emailHelp" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">
                                <?= $translator->trans("Password") ?>
                            </label>
                            <input type="password" class="form-control" id="inputPassword" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-dark">
                                <?= $translator->trans("Login") ?>
                            </button>
                        </div>
                    </div>




                </form>

            </div>

        </div>
    </div>
    <footer class="text-white bg-dark">

        <div class="d-flex justify-content-between">
            <div class="p-2 bd-highlight">
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
                        <?= $translator->trans('Select language') ?>
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
            <div class="p-2 bd-highlight">
                © 2022-23 Copyright: ACL PROJECT GROUP 1

            </div>
            <div class="p-2 bd-highlight"></div>
        </div>




    </footer>






    <script>

        var a = false;
        $(document).ready(function () {
            $('#form1').submit(function (e) {
                e.preventDefault();
                document.getElementById("problems").innerHTML = "";
                $.ajax({
                    /*
                    manda richiesta al server di aggiungere la fattura, una volta aggiunta nel server verrà visualizzata anche sulla pagina attuale
                    */
                    type: "POST",
                    url: '../../BACK END/script_login.php',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response);
                        var message = JSON.parse(response);
                        //var message = JSON.parse(response);

                        // user is logged in successfully in the back-end 
                        // let's redirect 
                        if (message.text.includes("failed")) {
                            $("#problems").append("<p class='text-danger'><?= $translator->trans("Incorrect email and/or password"); ?></p > ");
                        }
                        else {
                            window.location = message.text;
                        }
                    }
                });

            })
        })
    </script>



</body>

</html>