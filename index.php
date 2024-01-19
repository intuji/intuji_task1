 <!DOCTYPE>
 <html>

 <head>
     <style>
         .error {
             color: red;
         }
     </style>

 </head>

 <body>
    
     <?php
        include_once "db/dbconfig.php";

        //defining variables and setting them to empty value
        $nameErr = $ageErr = $addressErr = $emailErr = $commonErr = "";
        $name = $age = $address = $email = "";

        if (isset($_POST['submit'])) {
            //getting the values from input field of html form
            $id = null;
            $name = $_POST["name"];
            $age = $_POST["age"];
            $address = $_POST["address"];
            $email = $_POST["email"];

            //validation for different input fields
            if (empty($_POST["name"]) || empty($_POST["age"]) || empty($_POST["address"]) || empty($_POST["email"])) {
                $commonErr =  "Warning!!!All field must be filled.Data is not submitted.</br></br>";
            } elseif (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
                $nameErr = "Warning!!!Only alphabets are allowed.";
            } elseif (strlen($name) < 3 || strlen($name) > 30) {
                $nameErr = "Warning!!!Name should contain 3-30 characters.";
            } elseif (strlen($address) < 3) {
                $addressErr = "Warning!!!Address should contain more than 3 letters.";
            } elseif (!preg_match("/^([a-zA-Z].*[a-zA-Z].*[a-zA-Z])[a-zA-Z0-9\s\-_@]*$/", $address)) {
                $addressErr = "Warning!!!Include Alphabets also";
            } elseif ($age < 18 || $age > 60) {
                $ageErr = "Warning!!!Age must be between 18 to 60";
            } else {
                // Check email uniqueness before inserting into the database
                $emailCheckSql = "SELECT * FROM test WHERE email = '$email'";
                $emailCheckResult = mysqli_query($conn, $emailCheckSql);
                if ($emailCheckResult && mysqli_num_rows($emailCheckResult) > 0) {
                    $emailErr = "Warning!! This email is already registered...";
                } else {
                    // Inserting the data into the table "test".
                    $sql = "INSERT INTO test VALUES ('$id','$name','$age','$address','$email')";
                    if (mysqli_query($conn, $sql)) {
                        echo "<h3>Data Inserted Successfull... </h3> </br> ";
                        echo " name = $name </br> age= $age </br> address= $address </br> email=$email ";
                        // header('location:viewrecord.php');
                    } else {
                        echo "OOPS..Sorry!!! " . mysqli_error($conn);
                    }
                    // Close connection
                    mysqli_close($conn);
                }
            }
        }
        ?>

     <h1>Registeration Form</h1>
     <form method="post" action="index.php">
         <div class="container">
             Name : <input type="text" name="name" placeholder="enter your name" /><span class="error">*<?php echo $nameErr ?></span></br></br>
             Age : <input type="number" name="age" placeholder="enter your age" /><span class="error">*<?php echo $ageErr ?></span></br></br>
             Address : <input type="text" name="address" placeholder="enter your address" /><span class="error">*<?php echo $addressErr ?></span></br></br>
             Email : <input type="email" name="email" placeholder="enter your mail" /><span class="error">*<?php echo $emailErr ?></span></br></br>
             <span class="error"><?php echo $commonErr ?></span>
             <input type="submit" value="submit" name="submit" />
         </div>
     </form>
 </body>

 </html>