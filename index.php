<?php

include("config/config.php");

$config = new Config();

$res = $config->initDB();

// Insert
if (isset($_REQUEST['btn_submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];


    $resStud = $config->insertStudent($name, $age, $course);

    if ($resStud) {
        echo '<div class="container mt-5 col-6"> <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Stud Inserted Successfully...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Stud Insertion Failed...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

// Fetch Students
$result = $config->fetchAllStudents();

// Delete Students
if (isset($_REQUEST['btn_delete'])) {

    $deleteID = $_REQUEST['delete_id'];

    // echo $deleteID;
    $res = $config->deleteStudent($deleteID);

    if ($res) {
        echo '<div class="container mt-5 col-6"> <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Stud Deleted Successfully...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> </div>';

        $result = $config->fetchAllStudents();
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Stud Deletion Failed...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

// Update Student
$updateStud = null;
if (isset($_REQUEST['btn_edit'])) {
    $update_id = $_REQUEST['update_id'];

    $singleStud = $config->fetchSingleStudent($update_id);

    $updateStud = mysqli_fetch_assoc($singleStud);
}

if (isset($_REQUEST['btn_update'])) {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $course = $_REQUEST['course'];

    $res = $config->updateStudent($name, $age, $course, $id);

    if ($res) {
        echo '<div class="container mt-5 col-6"> <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Stud Updated Successfully...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> </div>';

        $result = $config->fetchAllStudents();
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Stud Updation Failed...
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


    <div class="container mt-5">
        <div class="col-4">
            <h1><?php if ($updateStud == null) {
                echo "Add";
            } else {
                echo "Update";
            } ?> Student</h1>

            <form method="post" class="pt-2">

                <input type="hidden" name="id" value="<?php if ($updateStud != null) {
                    echo $updateStud['id'];
                } ?>" class="form-control" required>

                <label>Name</label>
                <input type="text" name="name" value="<?php if ($updateStud != null) {
                    echo $updateStud['name'];
                } ?>" class="form-control" required>

                <br>
                <br>

                <label>Age</label>
                <input type="number" name="age" value="<?php if ($updateStud != null) {
                    echo $updateStud['age'];
                } ?>" class="form-control" required>

                <br>
                <br>

                <label>Course</label>
                <input type="text" name="course" value="<?php if ($updateStud != null) {
                    echo $updateStud['course'];
                } ?>" class="form-control" required>

                <br>
                <br>

                <button name="<?php if ($updateStud == null) {
                    echo "btn_submit";
                } else {
                    echo "btn_update";
                } ?>" class="btn <?php if ($updateStud == null) {
                     echo "btn-primary";
                 } else {
                     echo "btn-warning";
                 } ?>">
                    <?php if ($updateStud == null) {
                        echo "Add";
                    } else {
                        echo "Update";
                    } ?> Student</button>
            </form>
        </div>

        <div class="col-6 pt-5">
            <table class="table table-striped  table-dark table-hover ">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">AGE</th>
                        <th scope="col">COURSE</th>
                        <th scope="col" colspan="2">ACTION</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php while ($data = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <th scope="row"><?php echo $data['id']; ?></th>
                            <td>
                                <?php echo $data['name'] ?>
                            </td>
                            <td>
                                <?php echo $data['age'] ?>
                            </td>
                            <td>
                                <?php echo $data['course'] ?>
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $data['id']; ?>">
                                    <button name="btn_delete" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                            <td>
                                <form method="post">
                                    <input type="hidden" name="update_id" value="<?php echo $data['id'] ?>">
                                    <button name="btn_edit" class="btn btn-warning">Edit</button>
                                </form>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>