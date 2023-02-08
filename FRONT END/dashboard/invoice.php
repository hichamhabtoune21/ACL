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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>

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



</head>

<body class="d-flex flex-column" style="min-height: 100vh">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-dark vh-10 show d-none d-md-block overflow-hidden"
                style="color: white;padding-left: 18px;padding-top: 10px;font-size: 25px; width:100%;">

                <i class="bi bi-bounding-box"></i><span>ECMA</span>
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
                            <div style="padding-left: 20px;padding-top: 5px;font-size: 25px;">
                                <i class="bi bi-bounding-box"></i><span>ECMA</span>
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
                                    <a class="nav-link" aria-current="page" href="admin-dashboard.php"><i
                                            class="bi bi-house"></i>Home</a>
                                </li>

                                <li class="nav-item" style="padding-bottom: 20px;">
                                    <a class="nav-link" aria-current="page" href="all_users.php"><i
                                            class="bi bi-people"></i>Users</a>
                                </li>

                                <li class="nav-item" style="padding-bottom: 20px;">
                                    <a class="nav-link" href="#"><i class="bi bi-journal-check"></i>Clients</a>
                                </li>
                                <li class="nav-item" style="padding-bottom: 20px;">
                                    <a class="nav-link active" href="#"><i class="bi bi-bar-chart"></i>Invoices</a>
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
                <h1 style=" padding-left: 20px;">Invoice management</h1>

                <div class="overflow-auto">

                    <!--Modal -->
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form class="form1">

                                    <div class="modal-body">
                                        Show a second modal and hide this one with the button below.

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <select name="client" id="client" class="form-select" required>
                                                    <option value="" selected disabled hidden>Choose here</option>

                                                    <?php
                                                    $result = mysqli_query($connect, "SELECT * from cliente");
                                                    if (mysqli_num_rows($result)) {
                                                        while ($cliente = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?= $cliente["ID_Cliente"]; ?>">
                                                                <?= $cliente["Nome"]; ?>
                                                            </option>


                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="num" class="form-label">Progressive number</label>
                                                <input type="number" id="num" name="num" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Issuing date</label>
                                                <input type="date" id="date" name="date" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="bus_name" class="form-label">Business name</label>
                                                <input type="text" id="bus_name" name="bus_name" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="pay_type" class="form-label">Payment type</label>
                                                <select name="pay_type" id="pay_type" class="form-select" required>
                                                    <option value="card">Card</option>
                                                    <option value="cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">Cancel</button>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" id="save"
                                                data-bs-target="#exampleModalToggle" data-bs-toggle="">Save</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>

                    <button type="button" class="btn btn-info" data-bs-toggle="modal" href="#exampleModalToggle"><span
                            class="bi bi-plus-square"></span>&nbsp;Add</button>

                    <table class="table">



                        <thead>


                            <tr>
                                <th scope="col">Client</th>
                                <th scope="col">Progressive number</th>
                                <th scope="col">Issuing date</th>
                                <th scope="col">Business name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment type</th>
                                <th scope="col">Actions</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($connect, "SELECT * from fattura");
                            $invoice = mysqli_fetch_array($result);

                            if (mysqli_num_rows($result)) {
                                while ($invoice = mysqli_fetch_array($result)) {
                                    $c = mysqli_query($connect, "SELECT * from cliente WHERE ID_Cliente = " . $invoice["ID_Cliente"]);
                                    $client = mysqli_fetch_array($c);
                                    ?>

                                    <tr>
                                        <td>
                                            <?= $client["Nome"];
                                            $client["Cognome"] ?>
                                        </td>
                                        <td>
                                            <?= $invoice["Numero progressivo"]; ?>
                                        </td>
                                        <td>
                                            <?= $invoice["Data di emissione"]; ?>
                                        </td>
                                        <td>
                                            <?= $invoice["Ragione sociale"]; ?>
                                        </td>
                                        <td>
                                            <?= $invoice["Importo"]; ?>
                                        </td>
                                        <td>
                                            <?= $invoice["Tipo di pagamento"]; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger"><span
                                                    class="bi bi-x-square-fill"></span></button>
                                            <button type="button" class="btn btn-warning"><span
                                                    class="bi bi-pencil-fill"></span></button>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>

                    <!-- Tabella Bootstrap -->






                </div>



            </div>
        </div>
    </div>


</body>


<script>

    document.getElementById("save").addEventListener("click", validate);
    // document.getElementById("save").addEventListener("click", CheckForm);


    function validate() {
        const inputSignup = ["client", "num", "date", "bus_name", "pay_type"];



        let errors = "";
        let checkErrors = false;

        for (var key in inputSignup) {
            if (isEmpty(inputSignup[key])) {
                errors += inputSignup[key].substring(5) + " empty\n";
                checkErrors = true;
            }
        }
        const modal = document.getElementById("save");


        if (checkErrors) {
        }
        else {
            modal.dataset.bsToggle = "modal";
        }
        //console.log(document.getElementById("inputRepeatPassword").value);

    }
    function isEmpty(x) {
        return (document.getElementById(x).value == "" || document.getElementById(x).value == null);

    }



    $(document).ready(function () {

        //al click sul bottone del form
        $("#save").click(function () {

            //associo variabili

            //chiamata ajax
            $.ajax({

                //imposto il tipo di invio dati (GET O POST)
                type: "POST",

                //Dove devo inviare i dati recuperati dal form?
                url: "addInvoice.php",

                //Quali dati devo inviare?
                data: data: $('#form1').serialize(),
                dataType: "html",

                //Inizio visualizzazione errori
                success: function (msg) {
                    $("#risultato").html(msg); // messaggio di avvenuta aggiunta valori al db (preso dal file risultato_aggiunta.php) potete impostare anche un alert("Aggiunto, grazie!");
                },
                error: function () {
                    alert("Chiamata fallita, si prega di riprovare..."); //sempre meglio impostare una callback in caso di fallimento
                }
            });
        });
    });
</script>
</script>

</html>