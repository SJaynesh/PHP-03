<?php

include("config/config.php");

$config = new Config();

$res = $config->initDB();

// if ($res) {
//     echo "Database is connected....";
// } else {
//     echo "Database is not connected....";
// }

// $num = null;

// if (isset($num)) {
//     echo "This variable is set...";
// } else {
//     echo "This variable is not set...";
// }

// superglobal variable
// $_GET
// $_POST
// $_REQUEST

if (isset($_REQUEST['btn_submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    // echo "<br>Name : $name <br>";
    // echo "Age : $age <br>";
    // echo "Course : $course <br>";

    $resStud = $config->insertStudent($name, $age, $course);

    if ($resStud) {
        // echo "Student inserted successfully...";
        // header("Location: dashboard.php");

        echo '<div class="container mt-5 col-6"> <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Stud Inserted Successfully...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> </div>';
    } else {
        // echo "Student insertion failed...";
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Stud Insertion Failed...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!-- <a href="index.php">Home</a> | <a href="success.php">Success Page</a> -->


    <div class="container mt-5">
        <div class="col-4">
            <h1>Add Student</h1>

            <form method="post" class="pt-2">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>

                <br>
                <br>

                <label>Age</label>
                <input type="number" name="age" class="form-control" required>

                <br>
                <br>

                <label>Course</label>
                <input type="text" name="course" class="form-control" required>

                <br>
                <br>

                <button name="btn_submit" class="btn btn-primary">Add Student</button>
            </form>
        </div>
    </div>

    <a href="dashboard.php" style="padding : 25px">Dashboard</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>