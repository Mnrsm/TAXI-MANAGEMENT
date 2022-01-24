<?php 

$conn=mysqli_connect('localhost','sm','12345','taxi');
if(!$conn){
	echo "Connection Error".mysqli_connect_error();
}  

	// write query for all pizzas
	$sql = 'SELECT * FROM booktaxi';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$booktaxi = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
   
	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

	


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/head.php'); ?>
	<h4 class="center grey-text">BOOKING DETAILS</h4>
	<div class="container">
		<div class="row">
			<?php foreach ($booktaxi as $b) { ?>
				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($b['name']); ?></h6>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="bookingdetails.php?contactnum=<?php echo $b['contactnum']?>">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>


<form class="white" action="startadmin.php" method="post">
<div class="center">
            <input type="submit" name="Go back to home" value="Go back to home" class="btn brand z-depth-0">
        </div>  
    </form>

	<?php include('templates/footer.php'); ?>

</html>