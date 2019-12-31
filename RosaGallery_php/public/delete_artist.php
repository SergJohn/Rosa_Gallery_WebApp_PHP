<?php
    session_start();
    include('../private/session.php');

    if(isset($_POST['delete'])){

        // It was necessary 3 queries
        // because the constraints when trying to delete the artists first is necessary to delete all of his pieces of arts
        
        $name = mysqli_real_escape_string($connection, $_POST['artistToDelete']);

        $sql1 = "SELECT idartists FROM artists WHERE art_name = '$name'";

        $result = mysqli_query($connection, $sql1);

        $row = mysqli_fetch_assoc($result);

        $_SESSION['art_id'] = $row['idartists'];

        // Up finding the id of the artist
        // Down putting it in a variable and keeping with the 2 necessary deletes

        $id = $row['idartists'];

        $sql2 = "DELETE FROM items WHERE artists_idartists = '$id'";

        $sql3 = "DELETE FROM artists WHERE idartists = '$id'";


        echo "</br>SQL: $sql1 . $sql3 </br>";

        if(mysqli_query($connection, $sql2)){

            echo "Arts of this Artist deleted successfully.";

        
        }

        if(mysqli_query($connection, $sql3)){
            echo "Artist deleted successfully";
        }

        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }

        header('location: admin.php');

    }

?>