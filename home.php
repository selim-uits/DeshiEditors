<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="homeStyle.css" rel="stylesheet">
    <title>Home</title>
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
                        <a class="nav-link active" aria-current="page" href="home.php" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Home</a>
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

        <h1>Welcome To Deshi Editor's</h1>

        <p>
            This is a freelancing website. If you are a freelancer and want to work as an content (thumbnail/video)
            editor then click on signup and create your profile as a freelancer.If you want an editor then you can
            find thumbnail editors and video editors for your content by searching below. Feel free to search.
        </p>

        <div class="container search">
            <form action="home.php" method="post" class="my-2" role="search">
                <input class="form-control me-2 my-2" type="search" name="content" placeholder="Content (Type video/thumbnail)"
                    aria-label="Search" required><br>
                <input class="form-control me-2 my-2" type="search" name="budget" placeholder="Budget" aria-label="Search"
                    required><br>
                <input class="btn btn-outline-success my-2" type="submit" value="Search">
            </form>
        </div>

        <?php

        if(isset($_POST['content'])){
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

            ?>
                <h1>Search Result</h1>
            <?php

            $Content = $_POST['content'];
            $Budget = $_POST['budget'];

            $sql = "SELECT * FROM `registration` WHERE `type` = '$Content' AND `budget` <= '$Budget';";
            $result = mysqli_query($conn, $sql);

            $num = mysqli_num_rows($result);

            if($num > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <div class="container result">
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <img src="user.png" alt="" width="70%" height="160px">
                            </div>
                            <div class="col-8">
                            <span style="font-family: 'Times New Roman', Times, serif;font-size: 20px;color: black;margin-left: 100px;padding-bottom: 200px;">Name: <?php echo $row['name']; ?> </span><br>
                            <span style="font-family: 'Times New Roman', Times, serif;font-size: 20px;color: black;margin-left: 100px;padding-bottom: 200px;">Type: <?php echo $row['type']; ?> </span><br>
                            <span style="font-family: 'Times New Roman', Times, serif;font-size: 20px;color: black;margin-left: 100px;padding-bottom: 200px;">Budget: <?php echo $row['budget']; ?> </span><br>
                            <span style="font-family: 'Times New Roman', Times, serif;font-size: 20px;color: black;margin-left: 100px;padding-bottom: 200px;">Mobile: <?php echo $row['mobile']; ?></span><br>
                            <span style="font-family: 'Times New Roman', Times, serif;font-size: 20px;color: black;margin-left: 100px;padding-bottom: 200px;">Email: <?php echo $row['email']; ?></span><br>
                            </div>
                        </div>

                        <h1 style="text-align: center;">Portfolio</h1>

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
                        <hr>
                    </div>
                    <?php
                }
            }
            else
            {
                echo "No match found";
            }
        }
        ?>

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