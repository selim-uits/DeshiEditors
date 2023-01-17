<?php

session_start();

if(isset($_POST['email'])){
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

    $Email = $_POST['email'];
    $Password = md5($_POST['password']);

    $select = "SELECT * FROM `registration` WHERE `email` = '$Email' AND `password` = '$Password';";

    $result = mysqli_query($conn, $select);

    $num = mysqli_num_rows($result);

    if($num > 0)
    {
        /*$row = mysqli_fetch_assoc($result);
        echo "Name: ", $row['name'], ". ", "Age: ", $row['age'], ". ", "Email: ", $row['email'];
        echo "<br>";*/

        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_email'] = $row['email'];

        header('location:profile.php');
    }
    else
    {
        //echo "Incorrect password or email!<br>";
        $alert[] = 'Incorrect password or email!';
    }
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
    <link href="loginStyle.css" rel="stylesheet">
    <title>Login</title>
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
                        <a class="nav-link active" href="login.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main">

        <h1>Login Here</h1>

        <?php

        if(isset($alert))
        {
            foreach($alert as $alert)
            {
                echo '<span class="alert">'.$alert.'</span>';
            };
        };

        ?>

        <div class="container login">
            <form action="login.php" method="post" class="my-2">
                <input class="form-control me-2 my-2" type="email" name="email" placeholder="Enter your email"
                    aria-label="login" required><br>
                <input class="form-control me-2 my-2" type="password" name="password" placeholder="Enter your password" aria-label="login"
                    required><br>
                <input type="submit" value="Login" class="btn btn-outline-success">
            </form>
        </div>

        <p class="alter">Don't have an account? <a href="signup.html">Sign up</a> here</p>

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