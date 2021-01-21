<!DOCTYPE HTML>
<html>
<head>
    <title>Add a Item Your Backet</title>
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
  
    <div class="container">
   
        <div class="page-header">
            <h1>Add Item </h1>
        </div>
      
    <?php
        session_start();
        echo $user_id;
        if($_POST) {
 
        include '../config/database.php';
 
        try{
     
        $query = "INSERT INTO basket SET name=:name, description=:description";
 
        $stmt = $con->prepare($query);
        
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $description = htmlspecialchars(strip_tags($_POST['description']));
        

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Item added your basket.</div>";
        }

         else {
            echo "<div class='alert alert-danger'>Unable to save item.</div>";
        }
         
    }
     
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to Your Basket</a>
            </td>
        </tr>
    </table>
</form>
    </div>
      
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>