<?php

include("config/config.php");

$config = new Config();

// Fetch Students
$result = $config->fetchAllStudents();

// while ($data = mysqli_fetch_assoc($result)) {

//     print_r($data);
//     echo "<br>";
// }

// echo var_dump($data);


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

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <div class="container mt-5">
        <h1 class="mt-3">Dashboard</h1>
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
                                <button class="btn btn-warning">Edit</button>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

        <a href="index.php">Add Student</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>