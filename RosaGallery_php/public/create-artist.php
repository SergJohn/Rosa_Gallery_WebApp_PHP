<?php
    session_start();
    include('../private/session.php');
    //include('../private/db_connection_GCP.php');

    if(isset($_POST['create-artist'])){
        
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $website = mysqli_real_escape_string($connection, $_POST['website']);

    $sql = "INSERT INTO artists (art_name, art_address, art_website) VALUES ('$name', '$address', '$website')";

    echo "</br>SQL: $sql </br>";

    if(mysqli_query($connection, $sql)){
        echo "Records added successfully.";
        header('Location: admin.php');
    
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }


}


?>