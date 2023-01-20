<?php
include 'connection.php';
if(isset($_POST['submit']) ){
$date =$_POST['date'] ;
$slot=$_POST['slot'] ;
$id=$_POST['id'] ;
$query="INSERT into reservations (reservation_date,reservation_slot,user_id) VALUES ('$date','$slot','$id')";
$result= mysqli_query($con,$query) ;
    if($result) {
      header('location:display.php') ;
     }  else{
        
        die("failed to connect!"); 
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
  <body>
  <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Créer une reservation</h2>
                    <p>S il vous plait remplis ce formulaire pour ajouter une reservation.</p>
  <form method="post">
  <div class="form-group">
    <label>date</label>
    <input type="date" name="date" class="form-control">
    
  </div>
  <div class="form-group">
    <label >slot(matin/après-midi)</label>
    <input type="text" class="form-control"  name="slot">
  </div>
  <div class="mb-3">
    <label >user_id</label>
    <input type="text" class="form-control"  name="id">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <a href="display.php" class="btn btn-secondary ml-2">Anuuler</a>
</form>
  </div>
   
  </body>
</html> 


 
