<?php
    $con = mysqli_connect("localhost", "root", "ajdcjddl1!", "chatdb");

    $userID = $_POST["userID"];
    $userPassword = $_POST["userPassword"];
    $userName = $_POST["userName"];

    $statement = mysqli_prepare($con, "INSERT INTO user VALUE (?, ?, ?)");
    mysqli_stmt_bind_param($statement, "sssi", $userID, $userPassword, $userName);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>