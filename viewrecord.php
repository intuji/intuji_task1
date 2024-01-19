<?php
include_once "db/dbconfig.php"
?>

<!DOCTYPE>
<html>

<head>
    <title>
        view records
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <h1>Details records...</h1>
    </div>
    <a class="btn btn-warning m-2" href="index.php">Register User</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM test";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["age"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                            &nbsp;
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</body>

</html>