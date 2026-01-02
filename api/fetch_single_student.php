<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include('../config/config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    $res = $config->fetchSingleStudent($id);

    $result = mysqli_fetch_assoc($res);

    if ($result) {
        $arr['status'] = 200;
        $arr['error'] = false;
        $arr['students'] = $result;
    } else {
        $arr['status'] = 200;
        $arr['error'] = true;
        $arr['msg'] = "Student not found..";
    }


} else {
    http_response_code(400);
    $arr['status'] = 400;
    $arr['error'] = true;
    $arr['msg'] = "Only for GET HTTP Request method allowed...";
}

echo json_encode(value: $arr);
?>