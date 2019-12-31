<?php
    session_start();
    include('../private/session.php');

    //Check to see if the form (saveInfo) has been submitted
    if(isset($_POST['saveInfo'])){
        
        $name = mysqli_real_escape_string($connection, $_POST['CustomerName']);
        $username = mysqli_real_escape_string($connection, $_POST['CustomerUsername']);
        $email = mysqli_real_escape_string($connection, $_POST['CustomerEmail']);
        $password = mysqli_real_escape_string($connection, $_POST['CustomerPassword']);


        // $user = $_GET['user']; <- this would be used in the URL in case all these code had been placed in a different page
        $user = $_SESSION['login_user'];

        // I am using just If statements because the user should be able to update just the informations he/she/it/ wanted. Not all of them.
        if($name){
            $sql = "UPDATE customers SET cus_name = '$name' WHERE idcustomers = '$user'";
            $result = mysqli_query($connection, $sql);
            // echo "</br>SQL: $sql </br>";
            echo $result;
        }

        if($username){
            $sql1 = "UPDATE customers SET cus_username = '$username' WHERE idcustomers = '$user'";
            mysqli_query($connection, $sql1);
            // echo "</br>SQL: $sql1 </br>";
        }

        if($email){
            $sql2 = "UPDATE customers SET cus_email = '$email' WHERE idcustomers = '$user'";
            mysqli_query($connection, $sql2);
            // echo "</br>SQL: $sql2 </br>";
        }

        if($password){
            $sql3 = "UPDATE customers SET cus_pwd = '$password' WHERE idcustomers = '$user'";
            mysqli_query($connection, $sql3);
            // echo "</br>SQL: $sql3 </br>";
        }

        // After the query for updating has been submitted, alert when the changes take places
        $message = "The changes are going to take place after next Log in!!!";
        echo "<script type='text/javascript'>alert('$message');</script>";

        
        // header('location: customer.php');

}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer - Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/customer.css">
</head>
<body>

    <header>
        <nav>

            <ul>
                <li>
                    <div class="fav">
                        <a class="favLink" href="./favorites.php">
                            <p>Favorites</p>
                        </a>
                    </div>
                    
                </li>
                <li>
                    <div class="logout">
                        <a class="logoutLink" href="logout.php">
                            <p>Log out</p>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    
        <!-- <div class="logoRose">
                <img src="./img/IMG_8479.PNG" alt="logo" width="150px" height="150px">
            </div> -->
    </header>
    
    <main>

        <!--WELCOME-->
        
        <h1 class="welcome">WELCOME <br>
            <span class="customerName" data-toggle="modal" data-target="#profileCustomer"> 
                <a style="font-size: 70px;" class="customerName" href="#">
                    <?php echo $_SESSION['name']; ?>
                </a>
            </span>
        </h1>
        
        <!-- Modal to UPDATE Customer Informations -->
        <div class="modal fade" id="profileCustomer" tabindex="-1" role="dialog" aria-labelledby="profileCustomer"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileCustomer">My Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                           
                        <!--name, username, email, password - add edit functions-->
                        <h5><?php echo $_SESSION['username']; ?>'s Profile</h5>
                        <form method="POST"  class="admincustomer">
        
                            <div class="form-group prow row">
                                <div class="col-sm-6">
                                    Edit Name <input type="text" class="form-control" name="CustomerName" id=""
                                        placeholder="<?php echo $_SESSION['name']; ?>">
                                </div>
                            </div>
        
                            <div class="form-group prow row">
                                <div class="col-sm-6">
                                    Edit Username <input type="text" class="form-control" name="CustomerUsername" id=""
                                        placeholder="<?php echo $_SESSION['username']; ?>">
                                </div>
                            </div>
        
                            <div class="form-group prow row">
                                <div class="col-sm-6">
                                    Edit E-mail <input type="email" class="form-control" name="CustomerEmail" id=""
                                        placeholder="<?php echo $_SESSION['email']; ?>">
                                </div>
                            </div>
        
                            <div class="form-group prow row">
                                <div class="col-sm-6">
                                    Edit Password <input type="text" class="form-control" name="CustomerPassword" id=""
                                        placeholder="*********">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button name="saveInfo" type="submit" class="btn btn-primary">Save changes</button>
                            </div>
        
                        </form>
        
        
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        <!-- SEARCH AREA -->

        <div class="searchFilters">

            <h5 class="searchHeading">SEARCH BOX</h3>

            <!-- action for the following forms == action="./customer_view_art_pieces.php" -->

            <form method="POST" action="customer_search_title.php" class="form-inline my-2 my-lg-0">
                <div class="searchByTitle row">
                    <div class="col-lg-6 colTitle">
                        <p>By Title</p>
                        <input name="titleName" class="form-control mr-sm-2" type="search" placeholder="Select a piece of art by Title" aria-label="Search">
                    </div>
                    <div class="col-lg-6 searchBtn">
                        <button class="btn btn-outline-primary my-2 my-sm-0" name="searchTitle" type="submit">SEARCH</button>
                    </div>
                </div>
            </form>

            <form method="POST" action="customer_search_type.php" class="form-inline my-2 my-lg-0">
                <div class="searchByType row">
                    <div class="col-lg-6">
                        <p>By Type</p>
                        <input name="typeName" class="form-control mr-sm-2" type="search" placeholder="Select a piece of art by Type" aria-label="Search">
                    </div>
                    <div class="col-lg-6 searchBtn">
                        <button class="btn btn-outline-success my-2 my-sm-0" name="searchType" type="submit">SEARCH</button>
                    </div>
                </div>
            </form>

            <form method="POST" action="customer_search_artist.php" class="form-inline my-2 my-lg-0">
                <div class="searchByArtist row">
                    <div class="col-lg-6">
                        <p>By Artist</p>
                        <input name="artistName" class="form-control mr-sm-2" type="search" placeholder="Select a piece of art by Artist" aria-label="Search">
                    </div>
                    <div class="col-lg-6 searchBtn">
                        <button class="btn btn-outline-dark my-2 my-sm-0" name="searchArtist" type="submit">SEARCH</button>
                    </div>
                </div>
            </form>

        </div>

       

        <!-- END SEARCH AREA-->

    </main>
    

    <footer>
        <div>
            <p><small>Copyright@2019 <br> All the rights reserved <br> Created and Designed by mrosa <br>  <i>Find me on <a style="margin-left: 5px;" href="https://github.com/SergJohn"
                        class="fa fa-github"></a></i></small></p>
            
        </div>
        <div class="logoFooter">
            <img src="./img/IMG_8479.PNG" alt="" width="200px" height="200px">
        </div>
    </footer>



    <!-- JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    
</body>
</html>