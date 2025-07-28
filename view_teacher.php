<?php include_once "header.php" ?>


<div class="container-fluid">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Teacher ID</th>
      <th scope="col">Teacher Name</th>
      <th scope="col">Teacher Email</th>
      <th scope="col">Teacher Batch</th>
      <th scope="col">Teacher Image</th>
      <th scope="col" >Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $query ="SELECT tbl_teacher.teacher_id, teacher_name ,teacher_email, tbl_batch.batch_name ,tbl_teacher.teacher_img FROM `tbl_teacher` join tbl_batch on tbl_batch.batch_id = tbl_teacher.batch_info;";
        $result =  mysqli_query($connection,$query);
        if($result){
                while($rows = mysqli_fetch_assoc($result)){

            ?>
                <tr>
                    <td><?php echo $rows["teacher_id"]?></td>
                    <td><?php echo $rows["teacher_name"]?></td>
                    <td><?php echo $rows["teacher_email"]?></td>
                    <td><?php echo $rows["batch_name"]?></td>
                    <td><img style="height:50px; width:100px" src="<?php echo $rows["teacher_img"]?>"/></td>
                    <?php if($role  == "admin" ) { ?>
                    <td><a href="edit_teacher.php?id=<?php echo $rows["teacher_id"];?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="delete_teacher.php?id=<?php echo $rows["teacher_id"];?>" class="btn btn-danger"> Delete</a>
                    <?php } ?>
                   
                  
                </tr>
            <?php
                }
        }
    ?>
  </tbody>
</table>

</div>


<?php require 'footer.php'?>