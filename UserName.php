<?php
    $con = mysqli_connect("localhost", "chatdbmaster", "chatdbmaster", "chatdb");

    $userName = $_POST["userName"];
    $userID = $_POST["userID"];

    $statement = mysqli_prepare($con, "UPDATE user SET userName=? WHERE userID=?");
    mysqli_stmt_bind_param($statement, "ss", $userName, $userID);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>
