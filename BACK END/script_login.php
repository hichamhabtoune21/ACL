<?php
include("connect.php");

$email = $_POST["email"];
$password = $_POST["password"];

$query = mysqli_query($connect, "SELECT * FROM user WHERE email='$email' AND password = '$password' ");

if (mysqli_num_rows($query) > 0) {

    session_start();
    $_SESSION["id"] = session_id();

    $user = mysqli_fetch_array($query);
    $_SESSION["username"] = $user["Username"];
    $_SESSION["ruolo"] = $user["Role"];


    switch ($user["Role"]) {
        case "Admin":
            // header("Location: ../FRONT END/dashboard/admin-dashboard.php");
            echo json_encode(array("text" => "../dashboard/admin-dashboard.php"));

            break;
        case "Commerciale":
            //header("Location: ../FRONT END/dashboard/admin-dashboard.php");
            echo json_encode(array("text" => "../dashboard/admin-dashboard.php"));

            break;
        case "Amministrazione":
            //header("Location: ../FRONT END/dashboard/admin-dashboard.php");
            echo json_encode(array("text" => "../dashboard/admin-dashboard.php"));

            break;
        case "Capo area":
            //header("Location: ../FRONT END/dashboard/admin-dashboard.php");
            echo json_encode(array("text" => "../dashboard/admin-dashboard.php"));
            break;
        case "NULL":
        default:
            //header("Location: ../FRONT END/dashboard/null-dashboard.php");
            echo json_encode(array("text" => "../dashboard/null-dashboard.php"));


    }


} else {
    session_start();
    session_destroy();
    echo json_encode(array("text" => "failed"));
}
?>