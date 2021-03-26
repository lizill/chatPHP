<?php
    $con = mysqli_connect("localhost", "chatdbmaster", "chatdbmaster", "chatdb");

    $userID = $_POST["userID"];
    $userPassword = $_POST["userPassword"];

    $statement = mysqli_prepare($con, "INSERT INTO user VALUE (?, ?)");
    mysqli_stmt_bind_param($statement, "ss", $userID, $userPassword);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>
