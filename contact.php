<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = isset($_POST['name'])?$_POST['name']:"";
    $smg = isset($_POST['message'])?$_POST['message']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $to      = 'admin@example.com';
    $subject = 'the subject';
    $message = $smg. " from " . $name . "email : ".$email;
    // Sending email
	$headers = "From: chhun@test.com\r\n";
	$headers .= "Reply-To: chhun@test.com\r\n";
	$headers .= "CC: chhun@example.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
    if(mail($to, $subject, $message, $headers)){
        $smg = 'Your mail has been sent successfully.';
    } else{
        $smg = 'Unable to send email. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coffee shop</title>

    <link rel="stylesheet" href="css/coffee.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="logo">
            <span>Coffee Shop</span>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./coffee.php">Home</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="./product.php">Product</span></a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="./contact.php">Contact</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-8" style= "margin: auto;"  >
        <h1 class="mt-4">Contact Form</h1>
                    <h2><?php if(!empty($smg)) echo $smg;?></h2>
                    <form action="contact.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                        
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <!-- <input name="message" type="text" class="form-control" id="message" placeholder="Message" style="width: 100%; height: 150px;"> -->
                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Your Message" style="width: 100%; height: 150px;"></textarea> 
                        
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 30%; margin-bottom: 30px;">Send</button>
                   
                    </form>
        </div>

        
        <footer class=" text-center text-white" style="background: #0f9cda;">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!"
                        role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!"
                        role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!"
                        role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#!"
                        role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!"
                        role="button"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!"
                        role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright: Coffee Shop

            </div>
            <!-- Copyright -->
        </footer>


    </div>
    <script src="./jQurey/jquery-3.5.1.min.js"></script>
    <script src=".//bootstrap/js/bootstrap.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>