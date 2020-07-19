<?php 

include 'db_connect/conn.php';


    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $ingredients = $_POST['ingredients'];
        $email = $_POST['email'];

        $sql = "INSERT INTO pizzas(title, ingredients, email) 
        values('$title', '$ingredients' , '$email')";

        if(mysqli_query($conn, $sql))
        {
            header('location: index.php');
        }
        else
        {
            echo 'Error: ' . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pizza</title>
</head>
<body>

    <?php include 'templates/header.php';?>

    <h2 style="color: var(--grey)" class="text-center">Add Pizzas</h2>

    <form class="p-3" action="add.php" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" class="form-control" type="text">
            </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <input name="ingredients" class="form-control" type="text">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" class="form-control" type="text">
        </div>

    <button type="submit" name="submit" class="btn btn-light form-control">Submit</button>
    </form>

    <?php include 'templates/footer.php';?>

</body>
</html>