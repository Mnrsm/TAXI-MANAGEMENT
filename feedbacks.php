<?php 

	$conn=mysqli_connect('localhost','sm','12345','taxi');
if(!$conn){
	echo "Connection Error".mysqli_connect_error();
} 
if(isset($_POST['delete']))
{
	$details_to_delete=mysqli_real_escape_string($conn,$_POST['details_to_delete']);
	$sql="DELETE FROM feedback where feedbackid=$details_to_delete";
	if(mysqli_query($conn,$sql)){
		header('Location:newfeed.php');
	}
	{
		echo 'query error: '.mysql_error($conn);
	}
}
	// check GET request id param
	if(isset($_GET['feedbackid'])){
		
		// escape sql chars
		$feedbackid = mysqli_real_escape_string($conn, $_GET['feedbackid']);

		// make sql
		$sql = "SELECT * FROM feedback where feedbackid=$feedbackid";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$f = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/head.php'); ?>

	<div class="container center">
		<?php if($f): ?>
			<h4>FEEDBACK ID</h4>
			<p><?php echo htmlspecialchars($f['feedbackid']); ?></p>
			<h4>BOOKING ID</h4>
			<p><?php echo htmlspecialchars($f['booking_id']); ?></p>
			<h4>EMAIL</h4>
			<p><?php echo htmlspecialchars($f['email']); ?></p>
			<h4>MESSAGE</h4>
			<p><?php echo htmlspecialchars($f['message']); ?></p>
			<h4>RATING</h4>
			<p><?php echo htmlspecialchars($f['rating']); ?></p>

			<!--DELETE FORM-->
			<form action="feedbacks.php" method="POST">
				<input type="hidden" name="details_to_delete" value="<?php echo $f['feedbackid'] ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>
			<form class="white" action="startadmin.php" method="post">
            <div class="center">
            <input type="submit" name="Go back to home" value="Go back to home" class="btn brand z-depth-0">
        </div>  
    </form>
		<?php else: ?>
			<h5>No such feedback exists.</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>