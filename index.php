<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // create a database connection
    $con = mysqli_connect($server, $username, $password);

    // check for connection
    if(!$con){
        die("Connection to this Database failed due to".
        mysqli_connect_error());
    }
    // echo "Success connecting to DB";

    // collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `college`.`college` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;


    // execute the query
    if($con->query($sql) == true){
        // echo "Successfully Inserted!";

        // flag for successful insertion
    $insert = true;

    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    // closing the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="BIM Admission Open">
    <div class="container">
        <h1>Welcome to Orchid Admission Form!</h1>
        <p>Enter your details and submit for the Admission procedures.</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thank You for submitting your form. We will contact you soon for further inquiry.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>
    
</body>

</html>