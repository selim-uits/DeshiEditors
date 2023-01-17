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
    $Email = $_POST['email'];
    $Subject = $_POST['subject'];
    $Message = $_POST['message'];

    $sql = "INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`)
    VALUES (NULL, '$Name', '$Email', '$Subject', '$Message');";

    if($conn->query($sql)==true)
    {
        //echo "Successfully inserted";
        $alert[] = 'Thanks for your feedback';
    }
    else
    {
        echo "ERROR: $sql <br> $conn->error";
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
    <link href="contactStyle.css" rel="stylesheet">
    <title>Contact</title>
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
                        <a class="nav-link active" href="contact.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Contact</a>
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

        <h1>Contact Us</h1>

            <pre>
                Our Address
                121,Clear Water Bay Road

                Hong Kong
                +987654321
                +975318642
                DeshiEditors@gmail.com
            </pre>

        <?php

        if(isset($alert))
        {
            foreach($alert as $alert)
            {
                echo '<span class="alert">'.$alert.'</span>';
            };
        };

        ?>

        <div class="container contact">
            <form action="contact.php" method="post" class="my-2">
                <input class="form-control me-2 my-2" type="text" name="name" placeholder="Enter your name"
                    aria-label="contact" required><br>
                <input class="form-control me-2 my-2" type="email" name="email" placeholder="Enter your email"
                    aria-label="contact" required><br>
                <input class="form-control me-2 my-2" type="text" name="subject" placeholder="Enter subject"
                    aria-label="contact" required><br>
                <div class="mb-3">
                    <textarea class="form-control" type="text" name="message" placeholder="Enter your message"
                        id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
                <input type="submit" value="Submit" class="btn btn-outline-success">
            </form>
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