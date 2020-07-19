<?php 

    include 'db_connect/conn.php';

    $sql = 'Select * from pizzas';
    $result = mysqli_query($conn, $sql);

  

 
    if(isset($_POST['delete']))
    {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $deleting = "DELETE FROM pizzas WHERE id = $id_to_delete";

        if(mysqli_query($conn, $deleting))
        {
            header('location: index.php');
        }
        else
        {
            echo 'Query error: ' . mysqli_error($conn);
        }

    }
 




    mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">


<?php include 'templates/header.php';?>

<div class="container">
<div class="row justify-content-around">
<?php if(mysqli_num_rows($result) > 0): ?>
      
       <?php while($row = mysqli_fetch_assoc($result)): ?>
           
            <?php "id: " . $row["id"] . ",title: " . $row["title"] . ",ingredients " . $row["ingredients"] . ",email " . $row["email"] . " " . "<br>"; ?>



<div class="card text-center m-3 col-sm-12 col-md-4 col-lg-3" style="width: 18rem;">
  <img src="10219.jpg" class="card-img-top img-fluid rounded" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo "Pizza: " . $row["id"]; ?></h5>
    <p class="card-text"><?php echo "Title: " . $row["title"]; ?></p>
  </div>
  <ul class="list-group list-group-flush">
        <?php
        $ingredient = explode(",", $row["ingredients"]);       
        ?>

        <?php foreach ($ingredient as $singleIng): ?>
    <li class="list-group-item"><?php echo $singleIng; ?></li>
            
  </ul>
        <?php endforeach; ?>

  <div class="card-body">
          
  <form action="details.php" method="POST">
            <input type="hidden" value="<?php echo $row['id'];?>" name="id_to_details">  
            <input class="special text-primary" type="submit" value="Details" name="details">
            </form>

  <form action="index.php" method="POST">
        <input type="hidden" value="<?php echo $row['id'];?>" name="id_to_delete">
        <input class="special" type="submit" value="Delete" name="delete">
        </form>
  
  </div>
</div>

       <?php endwhile; ?>
   
    <?php else : ?>
   
   <?php echo "No Results";?>

    <?php endif; ?>

    </div>
</div>

<?php include 'templates/footer.php';?>
