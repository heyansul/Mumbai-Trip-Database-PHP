<?php
// $insert = false;
 /*   if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    // OR 
    
    // $con = mysqli_connect($db_hostname, $db_username, $db_password,$db_name);

    if (!$con) {
        die("Connection to this databases failed due to" . mysqli_connect_error());
    }
    // echo "Suceess Connecting to db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `delhi trip`.`delhitrip` ( `Name`, `Age`, `Gender`, `Email`, `Phone`, `Others`, `DT`) VALUES ($name, $age, $gender, $email, $phone, $desc , current_timestamp());";
    echo $sql;

    if ($con-> query($sql) == true) {
        echo "Successfully Inserted";
    } 
    else {
        echo "Error: $sql <br> $con->error ";
    }
    $con->close();
}*/

$insert = false;
$submit = true;
if (isset($_POST['name'])) {
    $db_hostname = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "delhi trip";

    $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
    if (!$conn) {
        echo "Connection Failed : " . mysqli_connect_error();
        exit;
    }
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO delhitrip ( name, age, gender, email, phone, others, DT) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc' , current_timestamp())";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error:" . mysqli_error($conn);
        exit;
    } else {
        // echo "Registration Successful";
        $insert = true;
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>

<body>
    <img class="bg2" src="bg2.jpg" alt="IIT Delhi">
    <div class="container">
        <h2>Welcome to IIT Delhi in Mumbai Trip form</h2>
        <p>Enter your details to confirm your participation in the trip</p>
        <?php
        if($insert == true){
            echo "<p class='submit'>Thanks for submitting your Form. Join us for Mumbai trip </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="Email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no">
            <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>

    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `delhitrip` (`Sno`, `Name`, `Age`, `Gender`, `Email`, `Phone`, `Others`, `DT`) VALUES ('1', 'textname', '23', 'male', 'xxx@gmail.com', '9999939399', 'Thid is the frist php database', current_timestamp()); -->
</body>

</html>