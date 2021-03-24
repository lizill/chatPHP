<?php
    $con = mysqli_connect("localhost", "root", "ajdcjddl1!", "chatdb");

    $userID = $_POST["userID"];
    $userPassword = $_POST["userPassword"];

    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE userID = ? AND userPassword = ?");
    mysqli_stmt_bind_param($statement, "ss", $userID, $userPassword);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $userPassword, $userName);

    $respones = array();
    $respones["success"] = false;

    while(mysqli_stmt_fetch($statement)) {
        $respones["success"] = true;
        $respones["userID"] = $userID;
        $respones["userPassword"] = $userPassword;
        $respones["userName"] = $userName;
    }

    echo json_encode($respones);
?>