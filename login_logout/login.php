<?php
//    include("db_config.php");
require_once "db_connect.php";
$db = new DB_CONNECT();
session_start();
$error = "";
$db = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
    $sql = "SELECT uid FROM tbl_user WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql) or die( mysqli_error($db));
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
    
    if($count == 1) {
    $_SESSION['myusername'] = $myusername;
    
    header("location:../admin.php");
    }else {
    $error = "Your Login Name or Password is invalid! Try Again!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    .login_form {
        margin-top: 40%;
        background-color: lightblue;
        padding: 40px 15px;
        border-radius: 10px;
    }

    .btn-primary {
        width: 30%;

    }
</style>
</head>

<body>

</div>

<div class="container  col-md-5 col-lg-5 col-xxl-3 m-auto ">
    <form class="login_form " action = "" method = "post">
        <h1 class="mb-4 text-xl-center">Login Form</h1>
        <div class="mb-2" style="color:#cc0000;">
                <?php echo $error; ?>
        </div>
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputUsername"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        
        <div class="col-md-12 text-center">
        <button type="submit" value=" Submit" class="btn btn-primary mb-2 ">Login</button>
        </div>
        <!-- <div class="text-center">Don't have an account? <a href="signup.php">Register Here</a></div> -->
    </form>


</div>



</body>

</html>