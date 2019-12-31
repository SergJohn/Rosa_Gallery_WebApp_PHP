<?php
    session_start();
    include('../private/session.php');
    
    echo $_GET['user'] . $_GET['artid'] . $_GET['page'];

    // using $_GET to get the information sent from the forms by URL
    $iditem = $_GET['artid']; 
    $idcustomer = $_GET['user'];
    $page = $_GET['page'];

    $sql = "INSERT INTO likes_favorites (items_iditems, customers_idcustomers) VALUES ($iditem, $idcustomer)";

    echo $sql . $_GET['page'];

    

    if(mysqli_query($connection, $sql)){
        echo "Records added successfully.";
        header('location: customer.php');
    
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }


?>