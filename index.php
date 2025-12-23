<?php

include("config/config.php");

$config = new Config();

$res = $config->initDB();

if ($res) {
    echo "Database is connected....";
} else {
    echo "Database is not connected....";
}

echo "<br><br>";

$num = null;

if (isset($num)) {
    echo "This variable is set...";
} else {
    echo "This variable is not set...";
}

// superglobal variable
// $_GET
// $_POST
// $_REQUEST

if (isset($_REQUEST['btn_submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    echo "<br>Name : $name <br>";
    echo "Age : $age <br>";
    echo "Course : $course <br>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Form</title>
</head>

<body>

    <!-- <a href="index.php">Home</a> | <a href="success.php">Success Page</a> -->

    <center>
        <h1>Add Student</h1>

        <form method="post">
            <label>Name</label>
            <input type="text" name="name" required>

            <br>
            <br>

            <label>Age</label>
            <input type="number" name="age" required>

            <br>
            <br>

            <label>Course</label>
            <input type="text" name="course" required>

            <br>
            <br>

            <button name="btn_submit">Add Student</button>
        </form>
    </center>
</body>

</html>