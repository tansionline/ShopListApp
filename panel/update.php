<!DOCTYPE HTML>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
</head>
<body>
 
    <div class="container">
        <div class="page-header">
            <h1>Update Your Basket</h1>
        </div>
     
        <?php
            include "../../components/navbar.php";

            $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Basket ID not found.');
 
            include '../config/database.php';
 
            try {
                $query = "SELECT id, name, description, FROM basket WHERE id = ? LIMIT 0,1";
                $stmt = $con->prepare( $query );
                
                $stmt->bindParam(1, $id);
                $stmt->execute();
     
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
                $name = $row['name'];
                $description = $row['description'];
        }
 
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
?>

    <!DOCTYPE HTML>
        <html>
            <head>
                <title>Edit </title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
            </head>
        <body>
            <div class="container">
            <div class="page-header">
                <h1>Update Basket</h1>
            </div>
        
        <?php
 
            if($_POST){
      
                try {

                    $query = "UPDATE basket 
                    SET name=:name, description=:description 
                    WHERE id = :id";
  
                    $stmt = $con->prepare($query);
  
                    $name = htmlspecialchars(strip_tags($_POST['name']));
                    $description = htmlspecialchars(strip_tags($_POST['description']));
            
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':id', $id);
          
            if ($stmt->execute() ) {
             echo "<div class='alert alert-success'>Basket was updated.</div>";
            }
            
            else {
             echo "<div class='alert alert-danger'>Unable to update basket. Please try again.</div>";
         }
     }
      
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
        }
    }
 ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="POST">

    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value="<?php echo htmlspecialchars($name, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to basket</a>
            </td>
        </tr>
    </table>
</form>
    </div> 
     
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
    </div> 
     
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>