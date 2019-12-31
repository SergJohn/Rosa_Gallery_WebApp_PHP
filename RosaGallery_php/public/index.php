<?php
/*****************************************
* This query uses the procedural interface
******************************************/

//start session
session_start();
include '../private/db_connection_GCP.php';

//Check to see if the form (login section) has been submitted
 if($_SERVER["REQUEST_METHOD"] == "POST") 
{
$username= $_POST['username'];
$pass= $_POST['password'];

// create SQL statement
// I have made two queries beacuse I need to check if the log in is an customer or an admin. (my database has one entity for each) 
$sql = "SELECT * FROM customers WHERE cus_username ='$username' and cus_pwd ='$pass'";
$sql2 = "SELECT * FROM admins WHERE adm_username ='$username' and adm_pwd ='$pass'";

// Query database
$result = mysqli_query($connection, $sql);
$result2 = mysqli_query($connection, $sql2);

$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);

// count the numbe rof records found
$count = mysqli_num_rows($result);
$count2 = mysqli_num_rows($result2);

// If result matched $myusername and $mypassword, table row must be 1 row
// When gets a match defines the global variables to be used in the whole application
  if($count > 0) {
        $_SESSION['login_user'] = $row['idcustomers'];
        $_SESSION['email'] = $row['cus_email'];
        $_SESSION['name'] = $row['cus_name'];
        $_SESSION['pass'] = $row['cus_pwd'];
        $_SESSION['username'] = $row['cus_username'];
        header('Location: customer.php');
     } 
     else if($count2 > 0){
        $_SESSION['login_user'] = $row2['idadmins'];
        $_SESSION['email'] = $row2['adm_email'];
        $_SESSION['name'] = $row2['adm_name'];
        $_SESSION['pass'] = $row2['adm_pwd'];
        $_SESSION['username'] = $row2['adm_username']; 
        header('Location: admin.php');
     }
     else {
      $error = "Your Login Name or Password is invalid";
    }
  
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rosa Gallery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>

    <main>
        <div class="Test">
        
        
            <div class="logo">
                <img src="./img/IMG_8479.PNG" alt="logo">
            </div>
            <br>
        
            <div class="section s1">
        
                <!-- <h1 class="company">Rosa Gallery</h1> -->
                <p class="slogan">The right place for your master piece</p>
            </div>
        
        
        
            <form method="POST">
                <div class="message1">
                    <p>Please login to you Rosa Gallery account</p>
                </div>
                <div class="form-group row">
                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> -->
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Enter your username">
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Enter your password">
                    </div>
                </div>
        
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </div>
        
                <div class="message2">
                    <p>Don't have an account yet? <a href="./register.php">Register here</a></p>
        
                </div>
        
            </form>
        
        
        </div>
    </main>
    


    <footer>
        <div>
            <p><small>Copyright@2019 <br> All the rights reserved <br> Created and Designed by mrosa <br> <i>Find me on <a
                            style="margin-left: 5px;" href="https://github.com/SergJohn"
                            class="fa fa-github"></a></i></small></p>
    
        </div>
        <div class="logoFooter">
            <img style="width: 200px; height: 200px;" src="./img/IMG_8479.PNG" alt="" width="200px" height="200px">
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