<!DOCTYPE>
<html>

<body>
    <?php
    include_once "db/dbconfig.php";

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        // query to update the input fields.
        $sql = "UPDATE `test` SET `name`='$name' , `age`= '$age', `address`= '$address', `email`='$email' WHERE `id` = '$id'";
        $result = $conn->query($sql);
        if ($result == TRUE) {
            echo "<h3>Record updated successfully....</h3>";
            header('location:viewrecord.php');
        } else {
            echo "Error..." . $sql . "</br>" . $conn->error;
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * from test WHERE id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $age = $row['age'];
                $address = $row['address'];
                $email = $row['email'];
            }
    ?>
            <h1 style="text-align:center;">Update the Register Form</h1>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="container" style="display:flex;justify-content:center;align-items:center;flex-direction:column;">
                    Name : <input type="text" name="name" value="<?php echo $name; ?>" /></br></br>
                    Age : <input type="number" name="age" value="<?php echo $age; ?>" /></br></br>
                    Address : <input type="text" name="address" value="<?php echo $address; ?>" /></br></br>
                    Email : <input type="email" name="email" value="<?php echo $email; ?>" /></br></br>
                    <input type="submit" value="update" name="update" />
                </div>
            </form>

</body>

</html>

<?php
        } else {
            header('Location: viewrecord.php');
        }
    }
?>