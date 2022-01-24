 <?php
$conn=mysqli_connect('localhost','sm','12345','taxi');
if(!$conn)
{
echo "Connection error".mysqli_connect_error();
}  
if(isset($_POST['Home']))
header('Location:start.php');  
$booking_id="";
$error =  array('booking_id'=>'');
$sql="select max(booking_id) from booktaxi";
      $result=mysqli_query($conn,$sql);
      $row = $result->fetch_array();
      $ma=intval($row['max(booking_id)']);
      $sql="select min(booking_id) from booktaxi";
      $result=mysqli_query($conn,$sql);
      $row = $result->fetch_array();
      $mi=intval($row['min(booking_id)']);
if(isset($_POST['submit'])){
if(empty($_POST['booking_id'])){
$error['booking_id']="A booking_id is required <br />";
}
else {
$booking_id = intval($_POST['booking_id']);
if ($_POST['booking_id']<$mi || $_POST['booking_id']>$ma) {
$error['booking_id']=" Booking_Id is invalid <br />";
}
}
 
if(array_filter($error)){  

}
else{  
         $booking_id=mysqli_real_escape_string($conn,$_POST['booking_id']);
         $sql="delete from booktaxi where booking_id=$booking_id"; 
if(mysqli_query($conn,$sql))
{  
header('Location:deleted_successfully.php');
}
else{
echo "query error ".mysqli_error($conn);
}
}
 
}
 ?>



<!DOCTYPE html>
<html>
 
<head>
    <title>Taxi Service</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style type="text/css">
    .brand{
         background: #cbb09c !important;
    }
    .brand-text{
        color: #cbb09c !important;
    }
</style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="#" class="brand-logo brand-text">Taxi Service</a>
        </div>
    </nav>
<section class="container grey-text">
<h4 class="center">CANCEL TAXI</h4>
<form class="white" action="delete.php" method="post">
<label>Enter Booking ID</label>
<input type="number" name="booking_id" value="<?php echo $booking_id ?>">
<div class ="red-text"><?php echo $error['booking_id']; ?>
 <div class="center">
<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
</div>
<div class="center">
<input type="submit" name="Home" value="Home" class="btn brand z-depth-0">
</div>
</form>
</section> 
</html>