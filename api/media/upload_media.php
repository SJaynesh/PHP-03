<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include("../../config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $file_name = $_FILES['profileImage']['name'];
    $tmp_name = $_FILES['profileImage']['tmp_name'];

    $uniq_id = uniqid("rnw");

    $name = $uniq_id . $file_name;

    $location = "../../uploads/" . $name;

    $isMoveFiled = move_uploaded_file($tmp_name, $location);

    if ($isMoveFiled) {
        $res = $config->insertMedia($name);

        if ($res) {
            http_response_code(201);
            $arr['status'] = 201;
            $arr['error'] = false;
            $arr['msg'] = "Media Inserterd Successfully...";
        } else {
            http_response_code(201);
            $arr['status'] = 201;
            $arr['error'] = true;
            $arr['msg'] = "Media Insertion Failed...";
        }
    } else {
        http_response_code(201);
        $arr['status'] = 201;
        $arr['error'] = true;
        $arr['msg'] = "Media Insertion Failed...";
    }
} else {
    http_response_code(response_code: 400);
    $arr['status'] = 400;
    $arr['error'] = true;
    $arr['msg'] = "Only for POST HTTP Request Method Allowed...";
}

echo json_encode($arr);

// Array => JSON => json encode => To convert Associative Array to JSON Data
// JSON => MAP / List of MAP => json decode => JSON Data to Associative Array

?>