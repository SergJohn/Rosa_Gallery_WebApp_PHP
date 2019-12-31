<?php
    session_start();
    include('../private/session.php');

    if(isset($_POST['create-items'])){
        
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $author = $_POST['author'];

    $sql = "INSERT INTO items (i_name, i_desc, i_type, artists_idartists) VALUES ('$name', '$description', '$type', '$author')";

    echo "</br>SQL: $sql </br>";

    if(mysqli_query($connection, $sql)){
        echo "Records added successfully.";
        header('Location: admin.php');
    
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }


}


?>