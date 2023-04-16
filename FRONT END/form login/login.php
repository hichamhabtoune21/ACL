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
                        <a class="nav-link active" aria-current="page" href="#"><?= _("Login");?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../form signup/signup.html"><?= _("Signup");?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about page.html"><?= _("About");?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="flex: 1 0 auto">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="col-md-6 col-lg-6 " style="padding: 100px;">
                <img src="https://www.mortenhansen.com/wp-content/uploads/2018/09/quiz-intro-image-2000x1720.png"
                    class="img-fluid d-block w-100" alt="...">
            </div>
            <div class="col-md-6 col-lg-6">
                <h1 style="font-size: 50px; padding-bottom: 50px;"><?= _("Login");?></h1>
                <div id="problems"></div>

                <form id="form1" method="post">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label"><?= _("Email address");?></label>
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                aria-describedby="emailHelp" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label"><?= _("Password");?></label>
                            <input type="password" class="form-control" id="inputPassword" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-dark"><?= _("Login");?></button>
                        </div>
                    </div>


                </form>

            </div>

        </div>
    </div>
    <footer class="text-center text-white bg-dark">
        <div class="text-center" style="padding: 20px;">
            © 2022-23 Copyright: ACL PROJECT GROUP 1
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
                            $("#problems").append("<p class='text-danger'><?= _("Incorrect email and/or password");?></p > ");
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