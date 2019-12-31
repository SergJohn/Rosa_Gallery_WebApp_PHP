<?php
    session_start();
    include('../private/session.php');

    if(isset($_POST['delete'])){
        
    $name = mysqli_real_escape_string($connection, $_POST['adminToDelete']);

    $sql = "DELETE FROM admins WHERE adm_name = '$name'";

    echo "</br>SQL: $sql </br>";

    if(mysqli_query($connection, $sql)){
        echo "Admin deleted successfully.";
        header('Location: admin.php');
    
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }


}


?>