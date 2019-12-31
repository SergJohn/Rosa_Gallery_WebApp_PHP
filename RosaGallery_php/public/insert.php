<?php
    session_start();
    include('../private/session.php');
    
    if(isset($_POST['register'])){
        
        $fname = mysqli_real_escape_string($connection, $_POST['fname']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $sql = "INSERT INTO customers (cus_name, cus_username, cus_address, cus_email, cus_pwd) VALUES ('$fname', '$username', '$address', '$email', '$password')";

        echo "</br>SQL: $sql </br>";

        if(mysqli_query($connection, $sql)){
            echo "Records added successfully.";
            header('location: index.php');
        
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }


    }


?>