<?php include_once "header.php"?>

 <div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">View Batches</h1>
               
    <table class="table">
  <thead>
    <tr>
     <th scope="col">Batch ID</th>
      <th scope="col">Batch Name</th>
      <th scope="col">Capcity</th>
      <th scope="col">Start Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
         
         $query = $query ="SELECT * FROM `tbl_batch`";
         $result = mysqli_query( $connection,$query);

         while($rows = mysqli_fetch_assoc($result))
         {
                 ?>
            <tr>
                <td><?php echo $rows["batch_id"]; ?></td>
                <td><?php echo $rows["batch_name"];?></td>
                <td><?php echo $rows["batch_capacity"];?></td>
                <td><?php echo $rows["batch_start_date"];?></td>
                 <?php if($role  == "admin" ) { ?>
                <td><a href="delete_batch.php?id=<?php echo $rows["batch_id"];?>" class="btn btn-danger"> Delete</a> | 
                <a href="edit_batch.php?id=<?php echo $rows["batch_id"];?>" class="btn btn-primary">Edit</a></td>
                <?php } ?>
    </tr>
            </tr>
            <?php


         }


    ?>
  </tbody>
</table>
 </div>
 </div>
<?php require 'footer.php'?>