<?php

$arr = ["id" => 101, "name" => "Nayan", "per" => 89.63, "course" => "PHP"];

print_r($arr);

$arr['phone'] = 7485151;

echo "<br>";

foreach ($arr as $key => $val) {
    echo $key . " : " . $val . "<br>";
}

?>