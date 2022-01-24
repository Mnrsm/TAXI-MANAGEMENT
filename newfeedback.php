<?php
$conn=mysqli_connect('localhost','sm','12345','taxi');
if(!$conn){
	echo "Connection Error".mysqli_connect_error();
} 
    $booking_id='';
    $email='';
    $message='';
    $rating='';
    $errors =array('booking_id' => '','email' => '','message' => '','rating' => '');

	if(isset($_POST['submit'])){
		if (empty($_POST['booking_id'])){
			$errors['booking_id'] = 'booking_id is required';
		}
		else{
		$booking_id = $_POST['booking_id'];
			if(!preg_match('/^[0-9]+$/', $booking_id)){
				$errors['booking_id'] = 'enter a valid booking_id';
		}
	}
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}
	if (empty($_POST['message'])){
			$errors['message'] = 'message is required';
		}
		else{
		$message = $_POST['message'];
			if(!preg_match('/^.+$/', $message)){
				$errors['message'] = 'enter a message';
		}
	}
	    if (empty($_POST['rating'])){
			$errors['rating'] = 'rating is required';
		}
		else{
		$rating = $_POST['rating'];
			if(!preg_match('/^[0-5]$/', $rating)){
				$errors['rating'] = 'enter a number between 0-5';
		}
	}
	
	if(array_filter($errors)){
		echo "YES";
	}
	else{ 
		$booking_id=mysqli_real_escape_string($conn,$_POST['booking_id']);
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$message=mysqli_real_escape_string($conn,$_POST['message']);
		$rating=mysqli_real_escape_string($conn,$_POST['rating']);
        echo $booking_id;
        echo $email;
        echo $message;
        echo $rating;
      
		$sql="insert into feedback(booking_id,email,message,rating) values('$booking_id','$email','$message','$rating')";
		if(mysqli_query($conn,$sql))
		{
			header("Location:start.php");
		}
	}
					
	}
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>	
 <section class="container grey-text">
  			<h4 class="center">FEEDBACK</h4>

		<form class="white" action="newfeedback.php" method="POST">
			<label>BOOKING ID</label>
			<input type="number" name="booking_id" value="<?php echo htmlspecialchars($booking_id) ?>">
			<div class="red-text"><?php echo $errors['booking_id']; ?></div>
			<label>EMAIL</label>
			<input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>MESSAGE</label>
			<input type="text" name="message" value="<?php echo htmlspecialchars($message) ?>">
			<div class="red-text"><?php echo $errors['message']; ?></div>
			<label>RATING</label>
			<input type="number" name="rating" value="<?php echo htmlspecialchars($rating) ?>">
			<div class="red-text"><?php echo $errors['rating']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
		<form class="white" action="start.php" method="post">
<div class="center">
            <input type="submit" name="Go back to home" value="Go back to home" class="btn brand z-depth-0">
        </div>  
    </form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>