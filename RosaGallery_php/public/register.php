<?php

//start session
    //session_start();
    //include('../private/session.php');
//include '../private/db_connection_GCP.php';
    //include('insert.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/register.css">

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
        
            <form method="POST" action="insert.php">
        
                <div class="message1">
                    <p>Register your own Rosa Gallery account</p>
                </div>
        
                <div class="form-group row">
                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> -->
                    <div class="col-sm-10">
                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter your full name">
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter your address">
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address">
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                </div>
                
        
                <div class="form-group row">
                    <div class="col-sm-10 btnDouble">
                        <button type="submit" class="btn btn-primary btn-block btnDouble"><a class="btnLinks"
                                href="./index.php">Back</a></button>
                        <button type="submit" name="register" class="btn btn-primary btn-block btnDouble">Register</button>
                    </div>
        
                </div>
        
                <div class="row rowTerms">
                    <div class="col-sm-6 colCheckBox">
                        <div>
                            <input type="checkbox" name="agreed" id="agreed">
                        </div>
                        <div>
                            <p class="messageCheckBox">I agreed with terms and conditions*</p>
                        </div>
        
                    </div>
                    <div class="col-sm-6">
                        <a href="#">
                            <p class="message1">Terms and Conditions</p>
                        </a>
                    </div>
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