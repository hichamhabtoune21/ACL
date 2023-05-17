<?php
require "../../BACK END/translation/init.php";
?>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.5.0/css/flag-icon.min.css">
    <script src="../../BACK END/translation/update_language.js"></script>
    <title>Signup Page</title>

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>


    <script>
        const inputSignup = ["inputName", "inputSurname", "inputEmail", "inputPassword", "inputRepeatPassword"];


        function checkSignup() {

            let errors = "";
            let checkErrors = false;

            for (var key in inputSignup) {
                if (isEmpty(inputSignup[key])) {
                    errors += inputSignup[key].substring(5) + " empty\n";
                    checkErrors = true;
                }
            }


            if (!isEmpty("inputPassword") && !isEmpty("inputRepeatPassword")) {



                let samePassword = document.getElementById("inputPassword").value != (document.getElementById("inputRepeatPassword").value);

                if (samePassword) {
                    errors += "Password and Repeat Password aren't the same";
                    checkErrors = true;
                }


            }
            if (checkErrors) {
                alert(errors);
            }
            //console.log(document.getElementById("inputRepeatPassword").value);
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
                    style="padding-left: 10px;">ACME</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../form login/login.php">
                        <?=$translator->trans("Login") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                        <?=$translator->trans("Signup") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../others/about page.php">
                        <?=$translator->trans("About") ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid bg-dark" style="color: white;flex: 1 0 auto;">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="col-md-3 col-lg-3 col-xl-3">
                <h1 style="font-size: 50px; padding-bottom: 50px; padding-top: 50px;">
                    <?=$translator->trans("Signup") ?>
                </h1>

                <form method="post" id="form1">

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputName" class="form-label">
                                <?=$translator->trans('Name') ?>
                            </label>
                            <input type="text" class="form-control" id="inputName" name="name" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputSurname" class="form-label">
                            <?=$translator->trans('Surname') ?>
                            </label>
                            <input type="text" class="form-control" id="inputSurname" name="surname" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">
                            <?=$translator->trans('Username') ?>
                            </label>
                            <input type="text" class="form-control" id="inputUsername" name="username" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">
                            <?=$translator->trans('Email address') ?>
                            </label>
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                aria-describedby="emailHelp" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">
                            <?=$translator->trans('Password') ?>
                            </label>
                            <input type="password" class="form-control" id="inputPassword" name="password"
                                pattern="^.{8,}$"
                                oninvalid="this.setCustomValidity('Password must be 8 characters long')" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputRepeatPassword" class="form-label">
                            <?=$translator->trans('Repeat password') ?>
                            </label>
                            <input type="password" class="form-control" id="inputRepeatPassword" name="password1"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-light">
                            <?=$translator->trans('Signup') ?>
                            </button>
                        </div>
                    </div>

                </form>
                <div id="problems">

                </div>
            </div>
        </div>
    </div>
    <footer class="text-center text-white bg-dark">
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
        const passwordInput = document.getElementById("inputPassword");

        passwordInput.addEventListener("input", function () {
            passwordInput.setCustomValidity("");
        });
        $(document).ready(function () {
            $('#form1').submit(function (e) {
                e.preventDefault();
                document.getElementById("problems").innerHTML = "";
                $.ajax({
                    type: "POST",
                    url: '../../BACK END/script_signup.php',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response.text);

                        // user is logged in successfully in the back-end 
                        // let's redirect 
                        var message = JSON.parse(response);

                        var warning = "";
                        if (message.text == true) {
                            /*warning = "<p class='text-success'><?= $translator->trans("Thanks! You are now registered") ?></p>";*/
                            alert('<?= $translator->trans("Thanks! You are now registered") ?>');
                            window.location.href="../form login/login.php";

                        } else {
                            warning = "<p class='text-danger'><?= $translator->trans("Error inserting data: ") ?>" + "<br>" +<?=$translator->trans('message.text')?> + "</p>";

                        }
                        $("#problems").append(warning);
                    }
                });
            })
        })
    </script>
</body>

</html>