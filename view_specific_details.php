<?php 
$conn=mysqli_connect('localhost','sm','12345','taxi');
if(!$conn)
{
	echo "Connection error".mysqli_connect_error();
}     
if(isset($_POST['Go back to home'])){
header("Location:start.php");
    
}
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
		$error['booking_id']="A Booking_Id is required <br />";
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
	<form class="white" action="view_specific_details.php" method="post">
		<label>Enter Booking ID</label>
<input type="number" name="booking_id" value="<?php echo $booking_id ?>">   
	 <div class ="red-text"><?php echo $error['booking_id']; ?></div>
		<div class="center">
			<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
		</div> 
	</form> 
</section> 
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 80%;
color: #588c7e;
font-family: monospace;
font-size: 15px;
text-align: Center;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>booking_id</th>
<th>name</th>
<th>source</th>
<th>destination</th>
<th>contactnum</th>
<th>age</th>
<th>driver_id</th>
<th>taxi_no</th>
<th>price</th>
</tr>
<?php  
$pr="Rs";
echo $booking_id;

      $sql="select * from booktaxi where booking_id='$booking_id' ";
      $result=mysqli_query($conn,$sql); 
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["booking_id"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["source"]. "</td><td>".$row["destination"]."</td><td>".$row["contactnum"]."</td><td>".$row["age"]."</td><td>".$row["driver_id"]."</td><td>".$row["taxi_no"]."</td><td>".$row["price"].$pr."</td><td>"."</td><tr>";
echo "</table>";
}
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
<form class="white" action="start.php" method="post">
<div class="center">
            <input type="submit" name="Go back to home" value="Go back to home" class="btn brand z-depth-0">
        </div>  
    </form>
<?php include('C:\xampps\htdocs\PHP_File\templates\footer.php'); ?>
</html>