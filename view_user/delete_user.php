<?php
require_once "db_connect.php";
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $db = new DB_CONNECT();
    $sql = "delete from tbl_user where uid=$uid";
    if (mysqli_query($db->connect(),$sql)){
        // if (!empty($_GET['oldUsername'])) {
        //     unlink('upload/' . $_GET['oldPicture']);
        // }
        header("location: list_user.php");
    }
}
?>