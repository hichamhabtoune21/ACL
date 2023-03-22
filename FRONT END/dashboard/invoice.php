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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->



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

        .bootstrap-select .btn {
            background-color: white;

        }
    </style>



</head>

<body class="d-flex flex-column" style="min-height: 100vh">
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
                                aria-controls="nav" data-toggle="collapse">
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
                                <hr style="width: 100%;color:white;">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-person-square"></i></i>Profile</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-10 col-lg-10 col-xl-10" style="padding:25px">
                <h3 style="padding-bottom:25px">INVOICE MANAGEMENT</h3>

                <div class="overflow-auto">

                    <!--Modal -->
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">New Invoice</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form id="form1" method="POST">

                                    <div class="modal-body">

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="client" class="form-label">Client</label>
                                                <select name="client" id="client" class="form-control selectpicker"
                                                    data-live-search="true" data-style="btn-white" required>
                                                    <option value="" selected disabled hidden>Choose here</option>

                                                    <?php
                                                    $result = mysqli_query($connect, "SELECT * from client");
                                                    if (mysqli_num_rows($result)) {
                                                        while ($client = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?= $client["ID_Client"]; ?>"
                                                                data-tokens="<?= $client["ID_Client"]; ?>">
                                                                <?= $client["Name"]; ?>
                                                                <?= $client["Surname"]; ?>

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
                                                <input type="num" id="num" name="num" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="number" id="amount" name="amount" class="form-control"
                                                    step="any" required>
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

                                        <div class="form-group" id="changeable">
                                            <button class="btn btn-secondary" id="save" type="submit"
                                                data-bs-target="#exampleModalToggle" data-bs-toggle="">Save</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>

                    <div class="modal fade" id="exampleModalToggle1" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Are you sure to delete it?
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-target="#exampleModalToggle1"
                                        data-bs-toggle="modal">Cancel</button>
                                    <div id="addDeleteButton">
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalToggle1"
                                            onclick="deleteInvoice(<?= $invoice['ID_Invoice'] ?>)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" href="#exampleModalToggle"
                        onclick="add()"><i class="bi bi-plus-square"></i>Add</button>
                    <div class="overflow-auto" style="padding-top:20px">

                        <table class="table table-dark table-striped">
                            <thead>
                                <tr style="">
                                    <th scope="col">Client</th>
                                    <th scope="col">Progressive number</th>
                                    <th scope="col">Issuing date</th>
                                    <th scope="col">Business name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment type</th>
                                    <th scope="col">Actions</th>


                                </tr>
                            </thead>
                            <tbody id="invoices">
                                <?php
                                $result = mysqli_query($connect, "SELECT * from invoice");
                                //$invoice = mysqli_fetch_array($result);
                                
                                if (mysqli_num_rows($result)) {
                                    while ($invoice = mysqli_fetch_array($result)) {
                                        $c = mysqli_query($connect, "SELECT * from client WHERE ID_Client = " . $invoice["ID_Client"]);
                                        $client = mysqli_fetch_array($c);
                                        ?>

                                        <tr id="<?= $invoice["ID_Invoice"] ?>">
                                            <td>

                                                <?= $client["Name"] ?>
                                                <?= $client["Surname"] ?>

                                            </td>
                                            <td>
                                                <?= $invoice["Progressive number"]; ?>
                                            </td>
                                            <td>
                                                <?= $invoice["Issuing date"]; ?>
                                            </td>
                                            <td>
                                                <?= $invoice["Business name"]; ?>
                                            </td>
                                            <td>
                                                <?= $invoice["Amount"]; ?>
                                            </td>
                                            <td>
                                                <?= $invoice["Payment type"]; ?>
                                            </td>
                                            <td nowrap>
                                                <div class='d-flex flex-row bd-highlight mb-3 gap-2'>

                                                    <button type='button' class='btn btn-dark p-2 justify-content-center'
                                                        onclick=invoiceInfo(<?= $invoice['ID_Invoice'] ?>) data-bs-toggle='modal'
                                                        href='#exampleModalToggle'><i
                                                            class='bi bi-pencil'></i>Edit</button>

                                                    <button type='button' class='btn btn-danger p-2 justify-content-center'
                                                        data-bs-toggle='modal' href='#exampleModalToggle1'
                                                        onclick=addDelete(<?= $invoice['ID_Invoice']?>)><i
                                                            class='bi bi-x-square'></i>Delete</button>
                                                </div>
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
    </div>
    <script>
        //document.getElementById("save").addEventListener("click", CheckForm);

        function add() {
            document.getElementById("exampleModalToggleLabel").innerHTML = "";
            document.getElementById("exampleModalToggleLabel").innerHTML = "New invoice";

            document.getElementById("changeable").innerHTML = "";
            document.getElementById("changeable").innerHTML = "<button class='btn btn-dark' id='save' type='submit'' data-bs-target='#exampleModalToggle' data-bs-toggle='' onclick='addInvoice()'>Save</button>"
        }



        function validate() {
            //event.preventDefault()
            const inputSignup = ["client", "num", "amount", "date", "bus_name", "pay_type"];



            let errors = "";
            let checkErrors = true;

            for (var key in inputSignup) {
                if (isEmpty(inputSignup[key])) {
                    errors += inputSignup[key].substring(5) + " empty\n";
                    checkErrors = false;
                }
            }
            return checkErrors;

        }

        function isEmpty(x) {
            return (document.getElementById(x).value == "" || document.getElementById(x).value == null);

        }
        // data: $('#form1').serialize(),


        function addInvoice() {


            const modal = document.getElementById("exampleModalToggle");


            if (validate()) {
                //modal.setAttribute("type","button");
                const save = document.getElementById("save");
                const truck_modal = document.querySelector('#exampleModalToggle');
                const modal = bootstrap.Modal.getInstance(truck_modal);
                modal.hide();

                $('#form1').submit(function (e) {
                    e.preventDefault();
                    $.ajax({
                        /*
                        manda richiesta al server di aggiungere la fattura, una volta aggiunta nel server verrà visualizzata anche sulla pagina attuale
                        */
                        type: "POST",
                        url: '../../BACK END/addInvoice.php',
                        data: $(this).serialize(),
                        success: function (response) {
                            console.log(response);
                            var message = JSON.parse(response);


                            // user is logged in successfully in the back-end 
                            // let's redirect 
                            $("#invoices").append(
                                "<tr id=" + message.ID_Invoice + "><td>" + message.clientName + " " + message.clientSurname + "</td>" +
                                "<td>" + message.number + "</td>" +
                                "<td>" + message.date + "</td>" +
                                "<td>" + message.bus_name + "</td>" +
                                "<td>" + message.amount + "</td>" +
                                "<td>" + message.pay_type + "</td><td nowrap><div class='d-flex flex-row bd-highlight mb-3 gap-2'><button type='button' class='btn btn-dark p-2' onclick=invoiceInfo(" + message.ID_Invoice + ") data-bs-toggle='modal' href='#exampleModalToggle'><i class='bi bi-pencil-fill'></i>Edit</button> <button type='button' class='btn btn-danger p-2' data-bs-toggle='modal' href='#exampleModalToggle1' onclick='addDelete(" + message.ID_Invoice + ")'><i class='bi bi-trash text-light'></i>Delete</button></div></td></tr>"
                            );
                            console.log(message.ID_Invoice);

                            /*
                            
                            */
                        }
                    });

                    //console.log("bello")
                })
            }
        }


        function editInvoice(id) {


            const modal = document.getElementById("exampleModalToggle");


            if (validate()) {
                //modal.setAttribute("type","button");
                const save = document.getElementById("save");
                const truck_modal = document.querySelector('#exampleModalToggle');
                const modal = bootstrap.Modal.getInstance(truck_modal);

                const client = $("#client").val();
                const num = $("#num").val();
                const amount = $("#amount").val();
                const date = $("#date").val();
                const bus_name = $("#bus_name").val();
                const pay_type = $("#pay_type").val();


                modal.hide();

                $('#form1').submit(function (e) {
                    e.preventDefault();
                    $.ajax({
                        /*
                        manda richiesta al server di aggiungere la fattura, una volta aggiunta nel server verrà visualizzata anche sulla pagina attuale
                        */
                        type: "POST",
                        url: '../../BACK END/editInvoice.php',
                        data: {
                            id: id,
                            num: num,
                            date: date,
                            amount: amount,
                            pay_type: pay_type,
                            client: client,
                            bus_name: bus_name
                        },
                        success: function (message) {
                            console.log(message);
                            message = JSON.parse(message);

                            // user is logged in successfully in the back-end 
                            // let's redirect 
                            if (message.text = "success") {
                                console.log(message.ID_Invoice);
                                var editedInvoice = document.getElementById(message.ID_Invoice);
                                editedInvoice.innerHTML = "";

                                editedInvoice.innerHTML = "<td>" + message.clientName + " " + message.clientSurname + "</td>" +
                                    "<td>" + message.num + "</td>" +
                                    "<td>" + message.date + "</td>" +
                                    "<td>" + message.bus_name + "</td>" +
                                    "<td>" + message.amount + "</td>" +
                                    "<td>" + message.pay_type + "</td><td nowrap><div class='d-flex flex-row bd-highlight mb-3 gap-2'><button type='button' class='btn btn-dark p-2' onclick=invoiceInfo(" + message.ID_Invoice + ") data-bs-toggle='modal' href='#exampleModalToggle'><i class='bi bi-pencil-fill'></i>Edit</button> <button type='button' class='btn btn-danger p-2' data-bs-toggle='modal' href='#exampleModalToggle1' onclick='addDelete(" + message.ID_Invoice + ")'><i class='bi bi-trash text-light'></i>Delete</button></div></td>"

                                //console.log(message.ID_Invoice);
                            }
                            else if (message.text = "failed") {
                                console.log("failed");
                            }
                        }
                    });

                    //console.log("bello")
                })
            }
        }

        //resetta modal
        $(".modal").on("hidden.bs.modal", function () {
            $(this).find('form').trigger('reset');
        });

        function addDelete(id) {
            document.getElementById("addDeleteButton").innerHTML = "<button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModalToggle1' onclick='deleteInvoice(" + id + ")'>Delete</button>";
        }

        function deleteInvoice(id) {
            //rimuove fatture prendendo come paramentro l'id della riga della tabella e della tabella padre
            console.log(id);

            var row = document.getElementById(id);
            row.parentNode.removeChild(row);


            $.ajax({
                type: "POST",
                url: '../../BACK END/deleteInvoice.php',
                data: {
                    ID_Invoice: id,
                },
                success: function (response) {
                    //var message=JSON.parse(response);
                    //console.log("funge");
                    //alert("oooo");
                },
                error: function () {
                    alert("oooo");
                }

            })
        }

        function invoiceInfo(id) {
            document.getElementById("exampleModalToggleLabel").innerHTML = "";
            document.getElementById("exampleModalToggleLabel").innerHTML = "Modify invoice";

            document.getElementById("changeable").innerHTML = "";
            document.getElementById("changeable").innerHTML = "<button class='btn btn-dark' id='save' type='submit'' data-bs-target='#exampleModalToggle' data-bs-toggle='' onclick=editInvoice(" + id + ")>Edit</button>"

            $.ajax({
                type: "POST",
                url: "../../BACK END/invoice_search.php",
                data: {
                    ID_Invoice: id
                },
                success: function (message) {
                    message = JSON.parse(message);
                    console.log(message.clientID);
                    //document.getElementById("client").value = message.clientID;
                    $('.selectpicker').selectpicker('val', message.clientID);
                    document.getElementById("num").value = message.num;
                    document.getElementById("amount").value = message.amount;
                    document.getElementById("date").value = message.date;
                    document.getElementById("bus_name").value = message.bus_name;
                    document.getElementById("pay_type").value = message.pay_type;
                    document.getElementById("client").value = message.clientID;

                }
            })

        }


    </script>

</body>




</html>