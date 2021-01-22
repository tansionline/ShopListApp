<!DOCTYPE html>
<html>
       <head>
       <meta charset="utf-8">
       <title>Registration</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       </head>
       <body>
       
       <?php
       include "../../../../components/navbar.php";

       require('../config/database.php');

       if (isset($_REQUEST['username'])){

       $username = stripslashes($_REQUEST['username']);
       $username = mysqli_real_escape_string($con, $username); 

       $password = stripslashes($_REQUEST['password']);
       $password = mysqli_real_escape_string($con, $password);
       
       $email = stripslashes($_REQUEST['email']);
       $email = mysqli_real_escape_string($con, $email);
               
       $query = "INSERT into `register` (username, email, password)
       VALUES ('$username', '$email', '".md5($password)."')";

       $result = mysqli_query($con,$query);

       if ($result) {
              echo "<div class='form'>
              <h3>You are registered successfully.</h3>
              <br/>Click here to <a href='./login.php'>Login</a></div>";
       }
}
       else {
?>
<div class="mb-2 primary">
<div class="form-group">
       <h1>Registration</h1>
              
       <form class="form-control" name="registration" method="POST">
              <label for="username">Username:</label>
              <input class="form-control" type="text" name="username" placeholder="Username" required />

              <label for="email">Email:</label>
              <input class="form-control" type="email" name="email" placeholder="Email" required />
              
              <label for="password">Password: </label>
              <input class="form-control" type="password" name="password" placeholder="Password" required />
              
              <br>
              <input class="btn btn-primary" type="submit" name="submit" value="Register" />
       </form>
</div>
</div>
<?php } ?>
</body>

</html>
