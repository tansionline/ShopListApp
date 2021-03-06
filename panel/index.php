<?php
    include '../../../../components/navbar.html';
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Your Basket</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />     

    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
 
</head>
<body>
 
     <div class="container"> 
        <div class="page-header">
                <?php
                    include '../../../../components/navbar.html';
                    include '../config/database.php';
                    session_start(); 
                    $username = $_SESSION['username'];

                    if ($_SESSION['username'] == '') {
                        echo "<h1>All Basket </h1>";
                    } 
                    else {
                    echo "<h1>Welcome Your Basket, $username </h1>";
                    echo "
                    <a class='btn btn-giant btn-primary' href='../login/logout.php'>
                    <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span> Logout
                    ";

                    }
                ?>
            </a>
        </div>

        <?php  
            $action = isset($_GET['action']) ? $_GET['action'] : "";
 
            if($action=='deleted') {
                echo "<div class='alert alert-success'>Deleted.</div>";
            }

            $query = "SELECT id, name, description FROM basket ORDER BY id DESC";
            $stmt = $con->prepare($query);
            $stmt->execute();
            
            $num = $stmt->rowCount();

            if ($_SESSION['username'] == true) {
            echo " 
            <a class='btn btn-giant btn-primary' href='create.php'>
                <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> 
                Add Item
            </a>";
            }
            
            if($num > 0) {

                echo "<table class='table table-hover table-responsive table-bordered'>";
 
                echo "<tr>";
                    echo "<th>Name</th>";
                    echo "<th>Description</th>";
                    echo "<th>Action</th>";
                    echo "<th>User Name</th>";
                echo "</tr>";
                
            // fetch() is faster than fetchAll()
            // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
   
                extract($row);
                
                echo "<tr>";
                    echo "<td>{$name}</td>";
                    echo "<td>{$description}</td>";
                    echo "<td>";
                    
                    if ($_SESSION['username'] == true) {
                        echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
            
                        echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
                    }
                    else {
                        echo "<a href='../login/login.php';'  class='btn btn-danger'>Login</a>";
                    }
                    echo "</td>";
                    ///echo "<td>{$username}</td>";
                echo "</tr>";
            }
                echo "</table>";
            }
            
            else{
                echo "<div class='alert alert-danger'>No records found.</div>";
            }
        ?>
    </div> 
     
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script type='text/javascript'>

function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer) {
        window.location = 'delete.php?id=' + id;
    } 
}
</script>
</body>
</html>