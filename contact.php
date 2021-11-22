<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO `contact`.`sid` (`name`, `email`, `subject`,`message`, `dt`) VALUES ('$name', '$email', '$subject', '$message', current_timestamp());";

    if($con->query($sql) == true){
        ?>
        <script>
            alert("Message Sent Successfully!");
            </script>
        <?php
    }
        $con->close();

    }

?>
</body>
</html>