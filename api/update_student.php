<?php

header("Access-Control-Allow-Methods: PUT, PATCH");
header("Content-Type: application/json");

include("../config/config.php");
$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents('php://input'); // string (name = Mukesh Parmar, age = 21, course = Flutter)
    parse_str($input, $_UPDATE);

    $name = $_UPDATE['name'];
    $age = $_UPDATE['age'];
    $course = $_UPDATE['course'];
    $id = $_UPDATE['id'];

    $res = $config->updateStudent($name, $age, $course, $id);

    if ($res) {
        $arr['status'] = 200;
        $arr['error'] = false;
        $arr['msg'] = "Student updated successfully...";
    } else {
        $arr['status'] = 200;
        $arr['error'] = true;
        $arr['msg'] = "Student updation failed...";
    }

} else {
    http_response_code(400);
    $arr['status'] = 400;
    $arr['error'] = true;
    $arr['msg'] = "Only for PUT or PATCH HTTP Request method allowed...";
}

echo json_encode($arr);
?>