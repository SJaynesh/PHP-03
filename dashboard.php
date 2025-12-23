<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: black;
            color: white;
        }
    </style>

</head>

<body>
    <h1 class="mt-3">Dashboard</h1>
    <div class="container mt-5">
        <div class="col-6">
            <table class="table table-striped  table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">AGE</th>
                        <th scope="col">COURSE</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">101</th>
                        <td>Harsh</td>
                        <td>20</td>
                        <td>Flutter</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                            <button class="btn btn-warning">Edit</button>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">101</th>
                        <td>Harsh</td>
                        <td>20</td>
                        <td>Flutter</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                            <button class="btn btn-warning">Edit</button>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">101</th>
                        <td>Harsh</td>
                        <td>20</td>
                        <td>Flutter</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                            <button class="btn btn-warning">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>