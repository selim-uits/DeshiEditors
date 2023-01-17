<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "deshieditorsclone";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn)
{
    die("Connection failed due to" . mysqli_connect_error());
}
else
{
    //echo "Connection was successfully build<br>";
}


if(!isset($_SESSION['user_email']))
{
    header('location:login.php');
}
else
{
    $varify = $_SESSION['user_email'];
    $select = "SELECT * FROM `registration` WHERE `email` = '$varify';";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="profileStyle.css" rel="stylesheet">
    <title>Profile</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white; font-family: 'Times New Roman', Times, serif; font-size: 20px;">DeshiEditor's</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main">

        <div class="container">
            <div class="row">
                <div class="col-4">
                    <?php
                    if($row['file'] == '')
                    {
                        echo '<img src="user.png" width="100%" height="250px">';
                    }
                    else
                    {
                        echo '<img src="uploaded_img/'.$row['file'].'" width="100%" height="250px">';
                    }
                    ?>
                </div>
                <div class="col-8">
                    <p>Name: <span><?php echo $row['name'] ?></span></p>
                    <p>Type: <span><?php echo $row['type'] ?></span></p>
                    <p>Budget: <span><?php echo $row['budget'] ?></span></p>
                    <p>Mobile: <span><?php echo $row['mobile'] ?></span></p>
                    <p>Email: <span><?php echo $row['email'] ?></span></p>
                </div>
            </div>
        </div>

        <h1>Portfolio</h1>

        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="thumbnail.jpg" alt="" width="100%" height="250px">
                </div>
                <div class="col">
                    <img src="thumbnail.jpg" alt="" width="100%" height="250px">
                </div>
                <div class="col">
                    <img src="thumbnail.jpg" alt="" width="100%" height="250px">
                </div>
            </div>
        </div>

        <div class="container">
            <a href="logout.php" class="btn btn-outline-success">Logout</a>
        </div>
        
    </div>


    <div class="bg-dark">
        <footer class="py-3">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contact</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Company, Inc</p>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>