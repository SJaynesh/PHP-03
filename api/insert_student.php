<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include("../config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    $res = $config->insertStudent($name, $age, $course);

    if ($res) {
        http_response_code(201);
        $arr['status'] = 201;
        $arr['error'] = false;
        $arr['msg'] = "Student Inserterd Successfully...";
    } else {
        http_response_code(201);
        $arr['status'] = 201;
        $arr['error'] = true;
        $arr['msg'] = "Student Insertion Failed...";
    }
} else {
    http_response_code(response_code: 400);
    $arr['status'] = 400;
    $arr['error'] = true;
    $arr['msg'] = "Only for POST HTTP Request Method Allow...";
}

echo json_encode($arr);

// Array => JSON => json encode
// JSON => MAP / List of MAP (json decode)

?>