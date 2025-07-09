<?php include_once "header.php" ?>

<?php 
    if(isset($_GET["id"])){

        $id = $_GET["id"];
        $query = "SELECT * FROM `tbl_teacher` WHERE teacher_id = $id";
        $result = mysqli_query($connection,$query);
        if($result){
            $row = mysqli_fetch_assoc($result);
        }
    }
?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Teacher</h1>
    <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg">
                <input type="text" class="form-control" value="<?php echo $row["teacher_name"] ?> " name="teacher_name" placeholder="Enter Teacher name">
                </div>
                <div class="col-lg">
                <input type="text" class="form-control" value="<?php echo $row["teacher_email"] ?> " name="teacher_email" placeholder="Enter Teacher email">
                </div>
            </div>
            <br><br>
            <div class="row">
            <div class="col-lg">
                <select class="form-control" name="teacher_batch">
                    <option value="">Select Batches</option>
                    <?php 
                        $query = "SELECT * FROM `tbl_batch`";
                        $result =  mysqli_query($connection,$query);
                        if($result){
                          while($rows = mysqli_fetch_assoc($result)){
                         ?>
                                <option  value="<?php echo  $rows["batch_id"];?>"  <?php  if($rows["batch_id"] == $row["teacher_batch"]) { echo  "selected"; } ?>   > <?php echo  $rows["batch_info"];?></option>
                         <?php
                          }
                          
                        }
                       
                    ?>
                </select>
                       
            </div>
            <div class="col-lg">
                <input type="text" class="form-control" value="<?php echo $row["teacher_password"] ?>" name="teacher_password" placeholder="Enter Teacher password">
                </div>

            </div>
                        <br><br>
           <div class="row">
            <div class="col-lg">
                <input type="file" name="teacher_img" class="form-control">
                <img src="<?php echo $row["teacher_img_path"];?>" style="height:50px; width:100px"  />
            </div>
            <div class="col-lg"> <input type="submit" class="btn btn-primary" name="update"></div>
           </div>
    </form>
</div>
<?php  
    if(isset($_POST["update"])){
        $teacher_name =  $_POST["teacher_name"];
        $teacher_email =  $_POST["teacher_email"];
        $teacher_password =  $_POST["teacher_password"];
        $batch_info =  $_POST["teacher_batch"];  
        $teacher_img_name = $_FILES["teacher_img"]["name"];
        $teacher_img_tmp_name = $_FILES["teacher_img"]["tmp_name"];
        
        $path = "images/".$teacher_img_name;
        if(move_uploaded_file($teacher_img_tmp_name,$path)){
                $update_query = "UPDATE `tbl_teacher` SET `teacher_name`='$teacher_name',`teacher_email`='$teacher_email',`teacher_password`='$teacher_password',`batch_info`='$teacher_batch',`teacher_img_path`='$path' WHERE  teacher_id = $id";
                $res =  mysqli_query($connection,$update_query);
            if($res){
                echo "<script>
                    window.location.href = 'view-teacher.php'
                </script>";
            
            }
            else{
                echo "record not updated";
            }
        }
        else{
            $update_query = "UPDATE `tbl_teacher` SET `teacher_name`='$teacher_name',`teacher_email`='$teacher_email',`teacher_password`='$teacher_password',`batch_info`='$teacher_batch' WHERE  teacher_id = $id";
            $res =  mysqli_query($connection,$update_query);
            if($res){
                echo "<script>
                window.location.href = 'view-teacher.php'
            </script>";
            }
        }
    }
?>
<?php require 'footer.php'?>