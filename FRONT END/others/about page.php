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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.5.0/css/flag-icon.min.css">
    <script src="../../BACK END/translation/update_language.js"></script>

    <title>Login Page</title>

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
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
                        <a class="nav-link" aria-current="page" href="../form login/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../form signup/signup.php">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid" style="flex: 1 0 auto;">
        <div class="row row-space" style="height: 100%;">
            <div class="col-6 bg-dark float-left" style="color: white;">
                <h1 style="font-size: 50px; padding: 50px">ACL Crud</h1>

                <p style="font-size: 15;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur odio esse necessitatibus
                    mollitia fugiat fugit porro aspernatur voluptate, velit voluptatibus! Dicta velit omnis quas
                    exercitationem consectetur quibusdam, nemo assumenda cupiditate!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis placeat velit sed hic dolor at illum
                    consectetur molestias. Nemo magni exercitationem iste placeat reprehenderit? Id nihil est quo
                    recusandae consequatur!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe ullam aperiam aut sint expedita
                    alias, harum, eius voluptate doloremque repellendus voluptatibus asperiores, animi aliquam qui
                    molestiae est officia ut debitis.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab, error natus accusantium exercitationem
                    amet, numquam vero dicta corrupti ducimus incidunt vel quidem reiciendis fuga temporibus praesentium
                    eligendi. Tempora, suscipit neque.
                </p>
            </div>
            <div class="col-6" style="background-color: white;">
                <h1 style="font-size: 50px; padding: 50px;">About us</h1>
                <p style="font-size: 15;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid magnam dolore obcaecati mollitia
                    facilis sequi quaerat ducimus voluptatem saepe similique commodi tempore fugit, tenetur praesentium
                    quam quae delectus rerum reprehenderit.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat repellendus, quae nisi
                    necessitatibus voluptatibus, distinctio nulla et dolore alias eaque ut ad dolor? Tempora autem
                    adipisci veniam ipsum eligendi mollitia.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro officiis culpa ab illum mollitia.
                    Amet necessitatibus minus laboriosam ratione harum veniam sit, voluptate, vitae deserunt, voluptatum
                    quisquam ullam voluptas nihil!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime obcaecati dolorem dignissimos quia,
                    distinctio ex numquam dolor quam illo, rem iure earum sed nobis, voluptatibus provident modi
                    cupiditate odit in.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur accusamus ullam nostrum ipsam
                    quisquam repellendus sint beatae pariatur aut, tempore obcaecati autem dolore quidem magnam. Placeat
                    fugiat officiis veniam corrupti?
                </p>

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



</body>

</html>