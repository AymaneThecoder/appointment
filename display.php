<?php
include 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
      
    <title>CRUD OPERATION</title> 
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">RESERVATION Details</h2>
                        <a href="user.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> ajouter des reservations</a>
                    </div>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">date</th>
      <th scope="col">Slots</th>
      <th scope="col">user_id</th>
    </tr>
  </thead>
  <tbody>
    <?php
   $query="Select * from reservations ";
    $result= mysqli_query($con,$query) ;
   if($result) {
     while($row=mysqli_fetch_assoc($result)) {
        $date=$row['reservation_date'];
        $slot=$row['reservation_slot'] ;
        $id=$row['user_id'] ;
    echo' <tr> 
    <th >'.$date.'</th>
    <td>'.$slot.'</td>
    <td>'.$id.'</td>
    <td> 
    <a href="read.php?id='. $id .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
    <a href="modifier.php?editid='. $id.'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>

   <a href="supprimer.php?deleteid='.$id.'"data-toggle="tooltip"title="Delete Record"><span class="fa fa-trash"></span></a>
   </td> 
    
  </tr>
    ' ;
    
 }
}
    ?>
    </div>
            </div>        
        </div>
    </div>
    
  </tbody>
</table>
</body>
</html>
