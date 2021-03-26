<?php
    $con = mysqli_connect("localhost", "chatdbmaster", "chatdbmaster", "chatdb");

    $userID = $_POST["userID"];

    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE userID = ?");
    mysqli_stmt_bind_param($statement, "s", $userID);
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
