<?php
    session_start();
    include('../private/session.php');

    if(isset($_POST['delete'])){
        
    $name = mysqli_real_escape_string($connection, $_POST['artToDelete']);

    $sql = "DELETE FROM items WHERE i_name = '$name'";

    echo "</br>SQL: $sql </br>";

    if(mysqli_query($connection, $sql)){
        echo "Art deleted successfully.";
        header('Location: admin.php');
    
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }


}


?>