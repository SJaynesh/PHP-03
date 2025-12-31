<?php

header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include('../config/config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $input = file_get_contents('php://input'); // return string ("id = 101")

    parse_str($input, $_DELETE); // To convert string to array

    $id = $_DELETE['id'];

    $res = $config->deleteStudent($id);

    if ($res) {
        $arr['status'] = 200;
        $arr['error'] = false;
        $arr['msg'] = "Student deleted successfully...";
    } else {
        $arr['status'] = 200;
        $arr['error'] = true;
        $arr['msg'] = "Student deletion failed...";
    }

} else {
    http_response_code(400);
    $arr['status'] = 400;
    $arr['error'] = true;
    $arr['msg'] = "Only for DELETE HTTP Request method allowed...";
}

echo json_encode($arr);
?>