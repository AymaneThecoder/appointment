<?php
include 'connection.php';
$id=$_GET['editid'] ;
if(isset($_POST['submit']) ){
$date =$_POST['date'] ;
$slot=$_POST['slot'] ;
$user_id=$_POST['id'] ;
$query="UPDATE reservations set reservation_date='$date' , reservation_slot ='$slot' ,user_id='$user_id'
where user_id=$id" ;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud operation </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" >
  </head>
  <body>
  <div class="container">
  <form method="post">
  <div class="mb-3">
    <label>date</label>
    <input type="date" name="date">
    
  </div>
  <div >
    <label >slot</label>
    <input type="text" class="form-control"  name="slot">
  </div>
  <div >
    <label >user_id</label>
    <input type="text" class="form-control"  name="id">
  </div>
  
  <button type="submit"  name="submit">Submit</button>
</form>
  </div>
   
  </body>
</html> 
