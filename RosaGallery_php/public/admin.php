<?php
    session_start();
    include('create-adm.php');
    include('create-artist.php');
    include('create-art.php');
    include('delete_admin.php');
    include('delete_artist.php');
    include('delete_art.php');
    include('../private/session.php');


    // Check to see if the form (saveInfo) has been submitted
    // All other futher comments on PHP are the same as the customer.php page
    if(isset($_POST['saveInfo'])){
        
        $name = mysqli_real_escape_string($connection, $_POST['AdminName']);
        $username = mysqli_real_escape_string($connection, $_POST['AdminUsername']);
        $email = mysqli_real_escape_string($connection, $_POST['AdminEmail']);
        $password = mysqli_real_escape_string($connection, $_POST['AdminPassword']);


        // $user = $_GET['user'];

        $user =  $_SESSION['login_user'];

        if($name){
            $sql = "UPDATE admins SET adm_name = '$name' WHERE idadmins = '$user'";
            $result = mysqli_query($connection, $sql);
            // echo "</br>SQL: $sql </br>";
            echo $result;
        }

        if($username){
            $sql1 = "UPDATE admins SET adm_username = '$username' WHERE idadmins = '$user'";
            mysqli_query($connection, $sql1);
            // echo "</br>SQL: $sql1 </br>";
        }

        if($email){
            $sql2 = "UPDATE admins SET adm_email = '$email' WHERE idadmins = '$user'";
            mysqli_query($connection, $sql2);
            // echo "</br>SQL: $sql2 </br>";
        }

        if($password){
            $sql3 = "UPDATE admins SET adm_pwd = '$password' WHERE idadmins = '$user'";
            mysqli_query($connection, $sql3);
            // echo "</br>SQL: $sql3 </br>";
        }

        $message = "The changes are going to take place after next Log in!!!";
        echo "<script type='text/javascript'>alert('$message');</script>";

        // header('location: admin.php');


}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>

    <header>
        <nav>
            <div class="logout">
                <a class="logoutLink" href="logout.php"><p>Log out</p></a>
            </div>
        </nav>

        <!-- <div class="logoRose">
            <img src="./img/IMG_8479.PNG" alt="logo" width="150px" height="150px">
        </div> -->
    </header>

    <main>

        <h1 class="welcome">WELCOME <br>
            <span class="adminName" data-toggle="modal" data-target="#profileAdmin">
                <a style="font-size: 70px;" class="adminName" href="#">
                    <?php echo $_SESSION['name']; ?>
                </a>
            </span>
        </h1>
        
        <!-- Modal -->
        <div class="modal fade" id="profileAdmin" tabindex="-1" role="dialog" aria-labelledby="profileAdmin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileAdmin">My Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
        
                        <!--name, username, email, password - add edit functions-->
                        <h5><?php echo $_SESSION['username']; ?>'s Profile</h5>
                        <form method="POST" class="adminprofile">
        
                            <div class="form-group prow row">
                                <div class="col-sm-6">
                                    Edit Name <input type="text" class="form-control" name="AdminName" id=""
                                        placeholder="<?php echo $_SESSION['name']; ?>">
                                </div>
                            </div>
        
                            <div class="form-group prow row">
                                <div class="col-sm-6">
                                    Edit Username <input type="text" class="form-control" name="AdminUsername" id=""
                                        placeholder="<?php echo $_SESSION['username']; ?>">
                                </div>
                            </div>
        
                            <div class="form-group prow row">
                                <div class="col-sm-6">
                                    Edit E-mail <input type="email" class="form-control" name="AdminEmail" id=""
                                        placeholder="<?php echo $_SESSION['email']; ?>">
                                </div>
                            </div>
        
                            <div class="form-group prow row">
                                <div class="col-sm-6">
                                    Edit Password <input type="text" class="form-control" name="AdminPassword" id=""
                                        placeholder="***********">
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
        
        
        <div class="row">
            <div class="col-sm-6">
                <div type="button" class="card" data-toggle="modal" data-target="#newArtist">
                    <div class="innerCard">
                        <p>Add New Artist</p>
                    </div>
                </div>
            </div>
        
            <!-- Modal -->
            <div class="modal fade" id="newArtist" tabindex="-1" role="dialog" aria-labelledby="newArtist" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newArtist">Add New Artist</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
        
                            <form method="POST" class="formNewArtist">
        
                                <div class="form-group row">
                                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> -->
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="nameArtist" placeholder="New Artist Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                                    <div class="col-sm-10">
                                        <input type="text" name="address" class="form-control" id="addressArtist"
                                            placeholder="Artist's Address">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                                    <div class="col-sm-10">
                                        <input type="text" name="website" class="form-control" id="webSiteArtist"
                                            placeholder="Artist's Web Site">
                                    </div>
                                </div>
                                <div class="modal-footer" style="margin-right:100px;">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="create-artist" class="btn btn-primary">Save changes</button>
                                </div>
        
                            </form>
        
                        </div>
                        
                    </div>
                </div>
            </div>
        
        
        
        
            <div class="col-sm-6">
                <div type="button" class="card" data-toggle="modal" data-target="#newPieceOfArt">
                    <div class="innerCard">
                        <p>Add New Piece of Art</p>
                    </div>
                </div>
            </div>
        
        
            <!-- Modal -->
            <div class="modal fade" id="newPieceOfArt" tabindex="-1" role="dialog" aria-labelledby="newPieceOfArt"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newPieceOfArt">Add New Piece of Art</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
        
                            <form method="POST" class="formNewPieceOfArt">
        
                                <div class="form-group row">
                                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> -->
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="namePieceOfArt" placeholder="Name Art">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                                    <div class="col-sm-10">
                                        <input type="text" name="description" class="form-control" id="descPieceOfArt" placeholder="Description">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                                    <div class="col-sm-10">
                                        <input type="text" name="type" class="form-control" id="typePieceOfArt" placeholder="Type of Art">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                                    <div class="col-sm-10">
                                        <input type="text" name="author" class="form-control" id="artistPieceOfArt" placeholder="Artist">
                                    </div>
                                </div>
                                <div class="modal-footer" style="margin-right:60px;">
                                    <a href="see_all.php">
                                        <button type="button" name="SeeAll" class="btn btn-primary">See all Art Pieces</button>
                                    </a>
                                    
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="create-items" class="btn btn-primary">Save changes</button>
                                </div>
        
                            </form>
        
        
                        </div>
                        
                    </div>
                </div>
            </div>
        
        
            <div class="col-sm-6">
                <div type="button" class="card" data-toggle="modal" data-target="#newAdmin">
                    <div class="innerCard">
                        <p>Create New Admin</p>
                    </div>
                </div>
            </div>
        
        
            <!-- Modal -->
            <div class="modal fade" id="newAdmin" tabindex="-1" role="dialog" aria-labelledby="newAdmin" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newAdmin">Create New Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
        
                            <form method="POST" class="formNewAdmin">
        
                                <div class="form-group row">
                                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> -->
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="nameNewAdmin"
                                            placeholder="Enter new admin name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                                    <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control" id="usernameNewAdmin"
                                            placeholder="Enter new admin username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="emailNewAdmin"
                                            placeholder="Enter new admin email address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter new admin password">
                                    </div>
                                </div>
                                <div class="modal-footer" style="margin-right:100px;">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="create" class="btn btn-primary">Save changes</button>
                                </div>
        
                            </form>
        
                        </div>
                        
                    </div>
                </div>
            </div>
        
        
            <div class="col-sm-6">
                <div type="button" class="card" data-toggle="modal" data-target="#deleteAdmin">
                    <div class="innerCard">
                        <p>Delete</p>
                    </div>
                </div>
            </div>
        
        
            <!-- Modal -->
            <div class="modal fade" id="deleteAdmin" tabindex="-1" role="dialog" aria-labelledby="deleteAdmin"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteAdmin">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
        
                            <form method="POST" class="form-inline my-2 my-lg-0">
                                <input name="adminToDelete" class="form-control mr-sm-2" type="search" placeholder="Administrator's Name"
                                    aria-label="Search">
                                <button name="delete" class="btn btn-outline-danger my-2 my-sm-0" type="submit">DELETE</button>
                            </form>
                            <br>
                            <form method="POST" action="delete_artist.php" class="form-inline my-2 my-lg-0">
                                <input name="artistToDelete" class="form-control mr-sm-2" type="search" placeholder="Artist's Name"
                                    aria-label="Search">
                                <button name="delete" class="btn btn-outline-danger my-2 my-sm-0" type="submit">DELETE</button>
                            </form>
                            <br>
                            <form method="POST" class="form-inline my-2 my-lg-0">
                                <input name="artToDelete" class="form-control mr-sm-2" type="search" placeholder="Art's Name"
                                    aria-label="Search">
                                <button name="delete" class="btn btn-outline-danger my-2 my-sm-0" type="submit">DELETE</button>
                            </form>
        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
        
        
        
        </div>


    </main>

    <footer>
        <div>
            <p><small>Copyright@2019 <br> All the rights reserved <br> Created and Designed by mrosa <br> <i>Find me on <a
                            style="margin-left: 5px;" href="https://github.com/SergJohn"
                            class="fa fa-github"></a></i></small></p>
    
        </div>
        <div class="logoFooter">
            <img src="./img/IMG_8479.PNG" alt="" width="200px" height="200px">
        </div>
    </footer>

    
    
    
    
    
    
    



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