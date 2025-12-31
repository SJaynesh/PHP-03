<?php

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

include('../config/config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $res = $config->fetchAllStudents();

    $all_students = [];
    while ($result = mysqli_fetch_assoc($res)) {
        array_push($all_students, $result);
    }

    $arr['status'] = 200;
    $arr['error'] = false;
    $arr['students'] = $all_students;


} else {
    http_response_code(400);
    $arr['status'] = 400;
    $arr['error'] = true;
    $arr['msg'] = "Only for GET HTTP Request method allowed...";
}

echo json_encode(value: $arr);
?>