<?php
include("connect.php");

$email = $_POST["email"];
$password = $_POST["password"];
$hashed_password=md5($password);

$query = "SELECT * FROM user WHERE Email=? AND Password=?";
$result=$connect->prepare($query);
$result->bind_param("ss",$email,$hashed_password);
$result->execute();
$result=$result->get_result();

if (mysqli_num_rows($result) > 0) {
    session_start();

    $_SESSION["id"] = session_id();

    $user = $result->fetch_array();
    $_SESSION["ID_User"] = $user["ID_User"];

    $_SESSION["username"] = $user["Username"];

    $_SESSION["ruolo"] = $user["Role"];


    switch ($user["Role"]) {
        case "Admin":
        case "Commercial":
        case "Area Manager":
            $_SESSION["Area"]=$user["Area"];
        case "Administration":
            $_SESSION["Permissions"]=array();
            $ruolo = mysqli_real_escape_string($connect, $_SESSION['ruolo']);
            $query1 = "SELECT Permission FROM permission_to_role WHERE Role='$ruolo'";
            $result = mysqli_query($connect, $query1);
            if (mysqli_num_rows($result)) {
                while ($permission = mysqli_fetch_array($result)) {
                    array_push($_SESSION['Permissions'],$permission['Permission']);
                }
            }
            echo json_encode(array("text" => "../dashboard/admin-dashboard.php"));
            
            break;
        case "NULL":
        case "null":
        default:
            //header("Location: ../FRONT END/dashboard/null-dashboard.php");
            echo json_encode(array("text" => "../dashboard/null-dashboard.php"));
        }


} else {
    session_start();
    session_destroy();
    echo json_encode(array("text" => "failed'$hashed_password'"));
}
?>