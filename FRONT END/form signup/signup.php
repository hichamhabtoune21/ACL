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
                        <a class="nav-link" aria-current="page" href="../form login/login.php"><?=_("Login")?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><?=_("Signup")?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about page.html"><?=_("About")?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid bg-dark" style="color: white;flex: 1 0 auto;">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="col-md-3 col-lg-3 col-xl-3">
                <h1 style="font-size: 50px; padding-bottom: 50px; padding-top: 50px;"><?=_("Signup")?></h1>

                <form method="post" id="form1">

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputName" class="form-label"><?=_("Name")?></label>
                            <input type="text" class="form-control" id="inputName" name="name" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputSurname" class="form-label"><?=_("Surname")?></label>
                            <input type="text" class="form-control" id="inputSurname" name="surname" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label"><?=_("Username")?></label>
                            <input type="text" class="form-control" id="inputUsername" name="username" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label"><?=_("Email address")?></label>
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                aria-describedby="emailHelp" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label"><?=_("Password")?></label>
                            <input type="password" class="form-control" id="inputPassword" name="password"
                                pattern="^.{8,}$"
                                oninvalid="this.setCustomValidity('Password must be 8 characters long')" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputRepeatPassword" class="form-label"><?=_("Repeat password")?></label>
                            <input type="password" class="form-control" id="inputRepeatPassword" name="password1"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-light"><?=_("Signup")?></button>
                        </div>
                    </div>

                </form>
                <div id="problems">

                </div>
            </div>
        </div>
    </div>
    <footer class="text-center text-white bg-dark">
        <div class="text-center" style="padding: 20px;">
            © 2022-23 Copyright: ACL PROJECT GROUP 1
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
                console.log("prova")

                document.getElementById("problems").innerHTML = "";
                $.ajax({
                    /*
                    manda richiesta al server di aggiungere la fattura, una volta aggiunta nel server verrà visualizzata anche sulla pagina attuale
                    */
                    type: "POST",
                    url: '../../BACK END/script_signup.php',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response);
                        /*
                        */

                        // user is logged in successfully in the back-end 
                        // let's redirect 
                        var message = JSON.parse(response);

                        var warning = "";
                        if (message.text==true) {
                            warning = "<p class='text-success'><?= _("Thanks! You are now registered")?></p>";

                        } else {
                            warning = "<p class='text-danger'><?=_("Error inserting data into the database: ")?>" + message.problem + "</p>";

                        }
                        $("#problems").append(warning);

                        /*
                        
                        */
                    }
                });

                //console.log("bello")
            })
        })
    </script>
</body>

</html>