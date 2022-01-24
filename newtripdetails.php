<?php 
$conn=mysqli_connect('localhost','sm','12345','taxi');
if(!$conn)
{
	echo "Connection error".mysqli_connect_error();
}      
$sql="select max(booking_id) from booktaxi";
      $result=mysqli_query($conn,$sql);
      $row = $result->fetch_array();
      $ma=intval($row['max(booking_id)']); 
?>
<?php
if(isset($_POST['Go back to home'])){
header("Location:start.php");
	}
 ?> 


<!DOCTYPE html>
<html>
 
<head>
    <title>SBYS Courier Service</title>
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
            <a href="#" class="brand-logo brand-text">TAXI SERVICE</a>  

        </div>
    </nav>
<section class="container grey-text">
	<h4 class="center">RIDE DETAILS</h4>
	<form class="white" action="newbooktaxi.php" method="post">  
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
      $sql="select * from booktaxi where booking_id='$ma' ";
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