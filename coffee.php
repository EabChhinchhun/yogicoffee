<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
// start pagination
$record_per_page = 4;
$page = '';
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
// end pagination
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "select * from tbl_post where title like '%" . $_GET['search'] . "%' order by uid ASC LIMIT $start_from, $record_per_page";
    //die($sql);
} else {
    $sql = "select * from tbl_post order by uid ASC LIMIT $start_from, $record_per_page";
}
$result = mysqli_query($db->connect(), $sql);

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
                    <input name="search" class="form-control" value="<?php echo $search ?>" type="text" placeholder="Search for..." />
                    <span class="input-group-append"><input class="btn btn-secondary" type="submit" value="Go!"></span>
                </form>
            </div>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide slider" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/3.jpg" class="d-block w-100" alt="...">
                </div>

            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-md-12">
                <h1 class="my-4">
                    Our Product
                </h1>
                <!-- Blog post-->
                <div class="row row-cols-1 row-cols-md-4 g-6">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col">
                    <div class="card">
                            <img height = "200px" class="card-img-top" src="./list_prodcut/upload/<?php echo $row['picture'] ?>" width="750px" alt="Card image cap" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $row['title'] ?></h2>
                                <p class="card-text"><?php echo $row['description'] ?></p>
                                <a class="btn btn-primary" href="detail.php?uid=<?php echo $row['uid'] ?>">Read More →</a>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
                </div>
                
                <!-- Pagination-->
                <?php
                $connect = mysqli_connect("localhost", "root", "Chhun@12345", "up_php");
                $page_query = "SELECT * FROM tbl_post ORDER BY uid ASC";
                $page_result = mysqli_query($connect, $page_query);
                $total_records = mysqli_num_rows($page_result);
                $total_pages = ceil($total_records / $record_per_page);
                if ($page > 1) {
                    echo "<a href='coffee.php?page=" . ($page - 1) . "'> Previous </a>";
                }
                if ($page < $total_pages) {
                    echo "<a href='coffee.php?page=" . ($page + 1) . "'> Next </a>";
                }
                ?>
            </div>
            
            </div>
        </div>
    </div>
        <!-- Start Section -->
        <section class="container py-5">
            <div class="row text-center pt-5 pb-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Services</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                        <h2 class=" h5 mt-4 text-center">Delivery Services</h2>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                        <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                        <h2 class="h5 mt-4 text-center">Promotion</h2>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                        <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
                    </div>
                </div>
            </div>
        </section>
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