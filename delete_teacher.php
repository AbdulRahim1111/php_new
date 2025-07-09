<?php
require_once "config.php";


  if(isset($_GET["id"])){
    $id = $_GET["id"];

    $query ="delete from tbl_teacher where teacher_id = $id";
    $result =  mysqli_query($connection,$query);

    if($result){
        header("location:view_teacher.php");
        exit;
    }
     //echo $id;
  }
?>