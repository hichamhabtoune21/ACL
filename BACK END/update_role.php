<?php
include("connect.php");

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $query = "SELECT * FROM user WHERE Email=?";
    $result = $connect->prepare($query);
    $result->bind_param("s", $_SESSION['email']);
    $result->execute();
    $result = $result->get_result();

    if (mysqli_num_rows($result) > 0) {
        $user = $result->fetch_array();
        $_SESSION["ruolo"] = $user["Role"];


        switch ($user["Role"]) {
            case "Admin":
            case "Commercial":
            case "Area Manager":
                $_SESSION["Area"] = $user["Area"];
            case "Administration":
                $_SESSION["Permissions"] = array();
                $ruolo = mysqli_real_escape_string($connect, $_SESSION['ruolo']);
                $query1 = "SELECT Permission FROM permission_to_role WHERE Role='$ruolo'";
                $result = mysqli_query($connect, $query1);
                if (mysqli_num_rows($result)) {
                    while ($permission = mysqli_fetch_array($result)) {
                        array_push($_SESSION['Permissions'], $permission['Permission']);
                    }
                }
                break;
            case "NULL":
            case "null":
            default:
            //header("Location: ../FRONT END/dashboard/null-dashboard.php");
        }


    } else {
        unset($_SESSION['id']);
    }
} else {
    unset($_SESSION['id']);
    
}
?>