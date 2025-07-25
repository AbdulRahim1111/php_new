<?php 
session_start();
$usertype = $_SESSION["usertype"];
if($usertype != "admin"){
    header("location:acces_denied.php");
    exit();
}
?>

<?php include_once "header.php"?>

     
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Add Teacher</h1>
            <form method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-lg">
                        <input type="text" class="form-control" name="teacher_name" placeholder="Enter Teacher Name">
                    </div>
                    
                    <div class="col-lg">
                        <input type="text" class="form-control" name="teacher_email" placeholder="Enter Teacher email">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-lg">
                        <select class="form-control" name="batch_info">
                            <option value="">select batches</option>
                            <?php
                                $query = "SELECT * FROM `tbl_batch`";
                                $result = mysqli_query($connection,$query);
                                if($result)
                                {
                                    while($rows = mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <option value="<?php echo  $rows["batch_id"];?>" > <?php echo  $rows["batch_name"];?></option>
                                    <?php
                                    } 
                                }
                            ?>
                        </select>
                    </div>
                  <div class="col-lg">
                <input type="text" class="form-control"  name="teacher_password" placeholder="Enter Teacher password">
                </div>

            </div>
                        <br><br>
           <div class="row">
            <div class="col-lg">
                <input type="file" name="teacher_img" class="form-control">
            </div>
            <div class="col-lg"> <input type="submit" class="btn btn-primary" name="submit"></div>
           </div>
    </form>
</div>
 <?php 
    if(isset($_POST["submit"])){
        $teacher_name = $_POST["teacher_name"];
        $teacher_email = $_POST["teacher_email"];
        $teacher_password = $_POST["teacher_password"];
        $batch_info = $_POST["batch_info"];
        $teacher_img = $_FILES["teacher_img"]["name"];
        $teacher_image_tmp_name = $_FILES["teacher_img"]["tmp_name"];
        
        $path = "img/".$teacher_img;

            if(move_uploaded_file($teacher_image_tmp_name,$path))
        {
            $query = "INSERT INTO `tbl_teacher`( `teacher_name`, `teacher_email`, `teacher_password`, `batch_info`, `teacher_img`) VALUES ('$teacher_name','$teacher_email','$teacher_password','$batch_info','$path')";
            $user_query = "INSERT INTO `tbl_users`(`username`, `user_password`, `user_type`) VALUES ('$teacher_email','$teacher_password','teacher')";
            $result = mysqli_query($connection,$query);
            $user_result =  mysqli_query($connection,$user_query);
            if($result && $user_query){
                echo "Record added Successfully";
            }
        }
    }

 ?>
<?php require 'footer.php'?>
