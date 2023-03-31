<?php
session_start();
include("connect.php");

if (isset($_POST["ID_User"], $_POST["Role"], $_POST["Area"])) {
    $idUser = $_POST["ID_User"];
    $newRole = $_POST["Role"];
    $area = $_POST["Area"];

    $query = "SELECT * FROM user WHERE ID_User = '$idUser'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            if ($area != "NULL") {
                $query = "UPDATE user SET `Role` = ?, `Area` = ? WHERE ID_User = ?";
                $result = $connect->prepare($query);
                $result->bind_param("sss", $newRole, $area, $idUser);
            }else{
                $query = "UPDATE user SET `Role` = ?, `Area` = NULL WHERE ID_User = ?";
                $result = $connect->prepare($query);
                $result->bind_param("ss", $newRole, $idUser);
            }
            $result->execute();
            if ($result) {
                echo json_encode(array("text" => "success"));
            } else {
                echo json_encode(array("text" => "failed to update user"));
            }
        } else {
            echo json_encode(array("text" => "user not found"));
        }
    } else {
        echo json_encode(array("text" => "failed to execute query"));
    }
} else {
    echo json_encode(array("text" => "invalid parameters"));
}
?>