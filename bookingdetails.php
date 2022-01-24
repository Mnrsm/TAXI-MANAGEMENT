<?php 

	$conn=mysqli_connect('localhost','sm','12345','taxi');
if(!$conn){
	echo "Connection Error".mysqli_connect_error();
} 
if(isset($_POST['delete']))
{
	$details_to_delete=mysqli_real_escape_string($conn,$_POST['details_to_delete']);
	$sql="DELETE FROM booktaxi where contactnum=$details_to_delete";
	if(mysqli_query($conn,$sql)){
		header('Location:newbook.php');
	}
	{
		echo 'query error: '.mysql_error($conn);
	}
}
	// check GET request id param
	if(isset($_GET['contactnum'])){
		
		// escape sql chars
		$contactnum = mysqli_real_escape_string($conn, $_GET['contactnum']);

		// make sql
		$sql = "SELECT * FROM booktaxi where contactnum=$contactnum";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$b = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/head.php'); ?>

	<div class="container center">
		<?php if($b): ?>
			<h4>NAME</h4>
			<p><?php echo htmlspecialchars($b['name']); ?></p>
			<h4>SOURCE</h4>
			<p><?php echo htmlspecialchars($b['source']); ?></p>
			<h4>DESTINATION</h4>
			<p><?php echo htmlspecialchars($b['destination']); ?></p>
			<h4>CONTACT-NUM</h4>
			<p><?php echo htmlspecialchars($b['contactnum']); ?></p>
			<h4>AGE</h4>
			<p><?php echo htmlspecialchars($b['age']); ?></p>

			<!--DELETE FORM-->
			<form action="newbook.php" method="POST">
				<input type="hidden" name="details_to_delete" value="<?php echo $b['contactnum'] ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>
			<form class="white" action="startadmin.php" method="post">
<div class="center">
            <input type="submit" name="Go back to home" value="Go back to home" class="btn brand z-depth-0">
        </div>  
    </form>
		<?php else: ?>
			<h5>No such booking exists.</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>