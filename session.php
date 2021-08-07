<?php
   require_once "./login_logout/db_connect.php";
   $db = new DB_CONNECT();
   session_start();
   $db = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
   
   $user_check = $_SESSION['myusername'];
   
   $ses_sql = mysqli_query($db,"select username from tbl_user where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['myusername'])){
      header("location:./login_logout/login.php");
      die();
   }
?>

