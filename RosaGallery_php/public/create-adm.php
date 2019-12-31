<?php
    session_start();
    include('../private/session.php');

    // Check to see if the form (create-adm by the create button and POST method) has been submitted
    if(isset($_POST['create'])){
        
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "INSERT INTO admins (adm_name, adm_email, adm_username, adm_pwd) VALUES ('$name', '$email', '$username', '$password')";

    echo "</br>SQL: $sql </br>";

    if(mysqli_query($connection, $sql)){
        echo "Records added successfully.";
        header('Location: admin.php');
    
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }


}


?>