<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
if(isset($_GET['uid'])){
    $sql = "select * from tbl_post where category=".$_GET['uid'];
} else {
    $sql = "select * from tbl_post";
}

$result = mysqli_query($db->connect(),$sql);

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
                <form class="form-inline my-2 my-lg-0" action="product.php" action="get">
                <input name="search" class="form-control" type="text" placeholder="Search for..." />
                <span class="input-group-append"><input class="btn btn-secondary" type="submit" value="Go!"></span>
                </form>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-md-8">
                    <h1 class="my-4">
                        MENU COFFEE
                    </h1>
                    <!-- Blog post-->
                    <div class="row row-cols-1 row-cols-md-3 g-5">
                            <?php
                            // $con = mysqli_connect('localhost', 'root', 'Chhun@12345', 'up_php');
                            // $result = mysqli_query($con, "SELECT * FROM tbl_post");
                            
                            if (mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                ?>
                                
                                    <div  class="col">
                                        <div class="card">
                                            <img height = "200px" src="./list_prodcut/upload/<?php echo $row['picture'] ?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $row['title'] ?></h5>
                                                <p class="card-text"><?php echo $row['description'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                
                                <?php
                                }
                            }
                            ?>
                    </div>
                    <!-- Pagination-->
                    
                </div>
                <!-- Side widgets-->
                <div class="col-md-4">
                    
                    <!-- Categories widget-->
                    <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled mb-0" >
                                        <?php
                                        $con = mysqli_connect('localhost', 'root', 'Chhun@12345', 'up_php');
                                        $result = mysqli_query($con, "SELECT * FROM tbl_category");
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <li><a  class="dropdown-item"  href="product.php?uid=<?php echo $row['uid']?>"><?php echo $row['name']?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <br>

        
        <!-- End Section -->
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