<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
$showAlert = false; 
$showError = false; 
$exists=false;
  
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    // include 'db_config.php';   
    
   
    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $cpassword = isset($_POST['cpassword'])?$_POST['cpassword']:"";
   
    $db = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
    $sql = "Select * from tbl_user where username='$username'";
    $result = mysqli_query($db, $sql) or die( mysqli_error($db));
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num == 0) {
        if(($password == $cpassword) && $exists==false) {
    
            // $hash = password_hash($password, 
            //                     PASSWORD_DEFAULT);
                
            // Password Hashing is used here. 
            // $sql = "INSERT INTO 'tbl_user' ( 'username', 
            //     'password') VALUES ('$username', 
            //     '$hash')";
            $sql = "INSERT INTO tbl_user(username,password) VALUES ('".$username."', '".$password."')";
    
            $result = mysqli_query($db, $sql) or die( mysqli_error($db));
    
            if ($result) {
                $showAlert = true; 
            }
        } 
        else { 
            $showError = "Your confirm password incorrect!"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="Username Already Exists!"; 
   } 
    
}//end if   
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    
<div class="container  col-md-5 col-lg-5 col-xxl-3 m-auto ">
        <form class="login_form " action = "" method = "post">
            <h1 class="mb-4 text-xl-center">Register Form</h1>

            <?php

                if($showAlert) {

                    echo ' <div class="alert alert-success 
                        alert-dismissible fade show" role="alert">

                        <strong>Success!</strong> Your account is 
                        now created and you can login. 
                    </div> '; 
                }

                if($showError) {
                    echo ' <div class="alert alert-danger 
                        alert-dismissible fade show" role="alert"> 
                    <strong>Error!</strong> '.$showError.'
                    </div> '; 
                }
                    
                if($exists) {
                    echo ' <div class="alert alert-danger 
                        alert-dismissible fade show" role="alert">

                    <strong>Error!</strong> '.$exists.'
                    </div> '; 
                    }

                ?>   
            <div class=" mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername"
                    aria-describedby="emailHelp" required="required">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="required">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" required="required">
            </div>
            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                <label class="form-check-label" for="exampleCheck1" >I accept the <a
                        href="#">Terms of Use</a> & <a href="#">Privacy Policy</a></label>
            </div>
            <div class="col-md-12 text-center">
            <button type="submit" value=" Submit" class="btn btn-primary mb-4 ">Register Now</button>
            </div>
            <div class="text-center">Already have an account? <a href="login.php">Login in</a></div>
        </form>
    </div>



</body>

</html>