<?php 
session_start();
if(isset($_SESSION["username"])){
    header("location:index.php");
    exit();
}
?>
<?php include_once "header.php"?>
<?php include_once "footer.php"?>