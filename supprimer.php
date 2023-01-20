<?php
include 'connection.php';


if(isset($_GET['deleteid'])){
    
    $id=$_GET['deleteid'] ;
  
    $query=" DELETE from reservations where  user_id=$id " ;
    $result= mysqli_query($con,$query) ;
    echo"delete";
    if($result) {
       
      header('location:display.php') ;
     }  else{
        die("failed tooo connect!"); 
    }
}

