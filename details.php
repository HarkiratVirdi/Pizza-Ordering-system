<?php 

  include 'db_connect/conn.php';

      $id_to_details = mysqli_real_escape_string($conn, $_POST['id_to_details']);

      $details = "select * from pizzas where id= $id_to_details";

      $results = mysqli_query($conn, $details);

    
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php';?>

<?php if(mysqli_num_rows($results) > 0): ?>
        <?php while ($detail = mysqli_fetch_assoc($results)): ?>
             <?php  $detail['id'];?> 
              <br>
             <?php  $detail['title'];?>
              <br>
              
             <?php  $detail['ingredients'];?>
              <br>
              
               <?php  $detail['email'];?>
              <br>

     <?php  $detail['created_at']; ?>
       


    <div class="card mb-3 m-auto" style="max-width: 90%;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="10219.jpg" class="card-img" alt="">
    </div>
    <div class="col-md-8">
      <div class="card-body p-5">
        <h5 class="card-title"> Title: <?php echo $detail['title'];?></h5>
        <p class="card-text">This Pizza is made with handmade crust and includes Ingredients such <?php echo $detail['ingredients'];?></p>  

        <p class="card-text">Ordered By: <?php echo $detail['email'];?></p>  

        <p class="card-text"><small class="text-muted">  Created At: <?php echo $detail['created_at']; ?></small></p>
      </div>
    </div>
  </div>
</div>



        <?php endwhile; ?>

        <?php else:?>
          <p>Something Is Wrong!</p>
        <?php endif;?>

<?php include 'templates/footer.php';?>