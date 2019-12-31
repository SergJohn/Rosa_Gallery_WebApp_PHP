<?php
    session_start();
    include('../private/session.php');

        $sql = "SELECT * FROM mario_2018358.items inner join mario_2018358.artists on items.artists_idartists = artists.idartists";
        $result = mysqli_query($connection, $sql);

        $count = mysqli_num_rows($result);

        if($count > 0) {
            $_SESSION['artName'] = $row['i_name'];
            $_SESSION['artType'] = $row['i_type'];
            $_SESSION['artDescription'] = $row['i_desc'];
            $_SESSION['artAuthor'] = $row['art_name'];
            $_SESSION['artID'] = $row['iditems'];
        } else {
            $error = "No Results Found";
            echo "<h1 style='text-align:center; margin-top: 100px;'>Nothing found!</h1>";
        }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pieces Of Art</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/arts.css">

</head>

<body>


        <header class="favorite-page">
            <h1>
                Pieces of Arts
            </h1>
        </header>

        <main>

            <div class="outterFav">

                <?php
            
                if($result){
                    
                    while($row = mysqli_fetch_assoc($result)){

                        //echo "$row[i_name]";
                        //$page = "type";

                        echo "
                            
                            <div class='artPiece'>
                                <div class='row paint-name-top'>
                                        <h1 class='paint-name col-12'>" . $row[i_name] . "</h1>
                                </div>

                                <div class='inner_container row'>

                                    <div class='paint row'>
                                        <div class='p_art col-sm'>
                                                <p class='placeholder'>'img placeholder...'</p>
                                                <!-- <img src='./img/sanchez.gif' alt='paint' width='550px' height='480px'> -->
                                        </div>

                                        <div class='description col-sm'>
                                                <h1 class='authorName'>" . $row[art_name] . "</h1>
                                                <p style='text-align: center; font-size: 15px;'>
                                                    " . $row['i_type'] . "  
                                                </p>
                                                <p class='paintDescription'>" . $row[i_desc] . "
                                                </p>
                                                
                                                

                                        </div>

                                    </div>
                                </div>
                            </div>
                        
                        
                        ";


                    }
                    
                } else echo "<h1 style='color: red;' no results found! </h1>";
            
            
            ?>


            

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