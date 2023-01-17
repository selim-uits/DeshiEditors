<?php
if(isset($_POST['name'])){
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
    
    $Name = $_POST['name'];
    $Age = $_POST['age'];
    $Mobile = $_POST['mobile'];
    $Email = $_POST['email'];
    $NID = $_POST['nid'];
    $Type = $_POST['type'];
    $Budget = $_POST['budget'];
    $File = $_FILES['file']['name'];
    $File_size = $_FILES['file']['size'];
    $File_tmp_name = $_FILES['file']['tmp_name'];
    $File_folder = 'uploaded_img/'.$File;
    $Password = md5($_POST['password']);
    $ConfirmPassword = md5($_POST['confirm_password']);

    $select = "SELECT * FROM `registration` WHERE `email` = '$Email' AND `password` = '$Password'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        //echo "user already exist!";
        //$error[] = 'user already exist!';
        $alert[] = 'user already exist!';
    }
    else
    {
        if($Password!=$ConfirmPassword)
        {
            //echo "password not matched!";
            //$error[] = 'password not matched!';
            $alert[] = 'password not matched!';
        }
        else
        {
            $sql = "INSERT INTO `registration` (`id`, `name`, `age`, `mobile`, `email`, `nid`, `type`, `budget`, `file`, `password`)
            VALUES (NULL, '$Name', '$Age', '$Mobile', '$Email', '$NID', '$Type', '$Budget', '$File', '$Password');";
            
            if($sql)
            {
                move_uploaded_file($File_tmp_name, $File_folder);
                header('location:login.php');
            }
            
            if($conn->query($sql)==true)
            {
                //echo "Successfully inserted";
                $alert[] = 'Registration completed';
            }
            else
            {
                echo "ERROR: $sql <br> $conn->error";
            }
        }
    }

    $conn->close();
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
    <link href="signupStyle.css" rel="stylesheet">
    <title>Signup</title>
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
                        <a class="nav-link active" href="registration.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main">

        <h1>Signup Here</h1>

        <?php

        if(isset($alert))
        {
            foreach($alert as $alert)
            {
                echo '<span class="alert">'.$alert.'</span>';
            };
        };

        ?>

        <div class="container signup">
            <form action="registration.php" method="post" class="my-2">
                <input class="form-control me-2 my-2" type="text" name="name" placeholder="Enter your name"
                    aria-label="signup" required><br>
                <input class="form-control me-2 my-2" type="text" name="age" placeholder="Enter your age"
                    aria-label="signup" required><br>
                <input class="form-control me-2 my-2" type="text" name="mobile" placeholder="Enter your mobile number"
                    aria-label="signup" required><br>
                <input class="form-control me-2 my-2" type="email" name="email" placeholder="Enter your email"
                    aria-label="signup" required><br>
                <input class="form-control me-2 my-2" type="text" name="nid" placeholder="Enter your nid number"
                    aria-label="signup" required><br>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="type" value="Thumbnail Editor" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Thumbnail Editor
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="type" value="Video Editor" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Video Editor
                    </label>
                </div><br>

                <input class="form-control me-2 my-2" type="text" name="budget" placeholder="Enter your budget"
                    aria-label="signup" required><br>

                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Upload Photo</label>
                    <input class="form-control" type="file" name="file" id="formFileMultiple" multiple>
                </div><br>

                <input class="form-control me-2 my-2" type="password" name="password" placeholder="Enter your password"
                    aria-label="signup" required><br>
                <input class="form-control me-2 my-2" type="password" name="confirm_password"
                    placeholder="Enter your confirm password" aria-label="signup" required><br>
                <input type="submit" value="Signup" class="btn btn-outline-success">
            </form>
        </div>

        <p class="alter">Already have an account? <a href="login.html">Login</a> here</p>

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