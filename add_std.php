
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
            <h1 class="h3 mb-4 text-gray-800">Add Student</h1>
            <form method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-lg">
                        <input type="text" class="form-control" name="std_name" placeholder="Enter Your Name">
                    </div>

                     <div class="col-lg">
                        <input type="email" class="form-control" name="std_email" placeholder="Enter Your Email">
                    </div>
                    
                     <div class="col-lg">
                        <input type="number" class="form-control" name="std_number" placeholder="Enter Your Contact-No">
                    </div>

                    <div class="col-lg">
                        <input type="text" class="form-control" name="std_password" placeholder="Enter Student Password">
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
                <br><br><br>

            </div>
              <div class="row">
                    <div class="col-lg">
                        <select class="form-control" name="teacher_info">
                            <option value="">select Teacher</option>
                            <?php
                                $query = "SELECT * FROM `tbl_teacher`";
                                $result = mysqli_query($connection,$query);
                                if($result)
                                {
                                    while($rows = mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <option value="<?php echo  $rows["teacher_id"];?>" > <?php echo  $rows["teacher_name"];?></option>
                                    <?php
                                    } 
                                }
                            ?>
                        </select>
                    </div>                
            </div>
                        <br><br>
           <div class="row">
            <div class="col-lg">
                <input type="file" name="std_img" class="form-control">
            </div>
           <div class="col-lg">
             <select name="status" class="form-control">
                    <option value="0">Activated</option>
                    <option value="1">DeActivated</option>
                </select>
   
           </div>
           
            </div>
            <br><br>

                        <div class="col-lg"> <input type="submit" class="btn btn-primary" name="submit"></div>

    </form>
</div>
 <?php 
    if(isset($_POST["submit"])){
        $std_name = $_POST["std_name"];
        $std_email = $_POST["std_email"];
        $std_password = $_POST["std_password"];
        $std_number = $_POST["std_number"];
        $batch_info = $_POST["batch_info"];
        $teacher_info = $_POST["teacher_info"];
        $std_img = $_FILES["std_img"]["name"];
        $std_image_tmp_name = $_FILES["std_img"]["tmp_name"];
        $status = $_POST["status"];
        
        $path = "img/".$std_img;

            if(move_uploaded_file($std_image_tmp_name,$path))
        {
            $query = "INSERT INTO `tbl_std`( `std_name`,`std_email`,`std_contact`,`std_password`, `batch_info`, `teacher_info`,`std_img`,`std_status`) VALUES ('$std_name','$std_email','$std_number','$std_password','$batch_info','$teacher_info','$path','$status')";
            $user_query = "INSERT INTO `tbl_users`(`username`, `user_password`, `usertype`) VALUES ('$std_email','$std_password','student')";
            $result = mysqli_query($connection,$query);
            $user_result =  mysqli_query($connection,$user_query);
            if($result && $user_query)
                {     echo "Record added Successfully";
            }
        }
    }

 ?>
<?php include_once "footer.php"?>

