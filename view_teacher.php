<?php include_once "header.php" ?>


<div class="container-fluid">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Teacher ID</th>
      <th scope="col">Teacher Name</th>
      <th scope="col">Teacher Email</th>
      <th scope="col">Teacher Batch</th>
      <th scope="col">Teacher Profile</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $q ="SELECT tbl_teacher.teacher_id, teacher_name ,teacher_email, tbl_batch.batch_name ,tbl_teacher.teacher_img_path FROM `tbl_teacher` join tbl_batch on tbl_batch.batch_id = tbl_teacher.teacher_batch;";
        $res =  mysqli_query($connection,$q);
        if($res){
                while($rows = mysqli_fetch_assoc($res)){

            ?>
                <tr>
                    <td><?php echo $rows["teacher_id"]?></td>
                    <td><?php echo $rows["teacher_name"]?></td>
                    <td><?php echo $rows["teacher_email"]?></td>
                    <td><?php echo $rows["batch_name"]?></td>
                    <td><img style="height:50px; width:100px" src="<?php echo $rows["teacher_img_path"]?>"/></td>
                </tr>
            <?php
                }
        }
    ?>
  </tbody>
</table>

</div>


<?php require 'footer.php'?>