<?php
//  on check si id existe avant le proceess
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    
    require_once "connection.php";
    
    
    $sql = "SELECT * FROM reservations WHERE user_id = ?";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $date = $row["reservation_date"];
                $address = $row["reservation_slot"];
                $salary = $row["user_id"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                die("failed to connect!");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($con);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    die("failed to connect!");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voir Les reservations </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Voir les Reservations </h1>
                    <div class="form-group">
                        <label>reservation_date</label>
                        <p><b><?php echo $row["reservation_date"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>reservation_slot</label>
                        <p><b><?php echo $row["reservation_slot"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>user_id</label>
                        <p><b><?php echo $row["user_id"]; ?></b></p>
                    </div>
                    <p><a href="display.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>