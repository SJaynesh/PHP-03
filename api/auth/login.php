<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include("../../config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $config->loginUser($email, $password);

    if ($res) {
        $arr['status'] = 200;
        $arr['error'] = false;
        $arr['msg'] = "User Login Successfully...";
    } else {
        $arr['status'] = 200;
        $arr['error'] = true;
        $arr['msg'] = "User Login Failed...";
    }

} else {
    http_response_code(response_code: 400);
    $arr['status'] = 400;
    $arr['error'] = true;
    $arr['msg'] = "Only for POST HTTP Request Method Allowed...";
}

echo json_encode($arr);
?>