<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
$uid = isset($_GET['uid'])?$_GET['uid']:"";
$sql = "delete from tbl_category where uid=$uid";
if (mysqli_query($db->connect(),$sql)){
    header("location: list_category.php");
}
?>