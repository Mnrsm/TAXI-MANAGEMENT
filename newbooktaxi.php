<?php
$conn=mysqli_connect('localhost','sm','12345','taxi');
if(!$conn){
	echo "Connection Error".mysqli_connect_error();
} 
    $name='';
    $source='';
    $destination='';
    $contactnum='';
    $age='';
    $errors =array('name' => '','source' => '','destination' => '','contactnum' => '','age' => '');

	if(isset($_POST['submit'])){
		if (empty($_POST['name'])){
			$errors['name'] = 'name is required';
		}
		else{
		$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'enter a valid name';
		}
	}
		if (empty($_POST['source'])){
			$errors['source'] = 'source is required';
		}
		else{
		$source = $_POST['source'];
			if(!preg_match('/^.+$/', $source)){
				$errors['source'] = 'enter a valid source';
		}
	}
	if (empty($_POST['destination'])){
			$errors['destination'] = 'destination is required';
		}
		else{
		$destination = $_POST['destination'];
			if(!preg_match('/^.+$/', $destination)){
				$errors['destination'] = 'enter a valid destination';
		}
	}
	    if (empty($_POST['contactnum'])){
			$errors['contactnum'] = 'contactnum is required';
		}
		else{
		$contactnum = $_POST['contactnum'];
			if(!preg_match('/^[6789][0-9]{9}$/', $contactnum)){
				$errors['contactnum'] = 'enter a valid contactnum';
		}
	}
	if (empty($_POST['age'])){
			$errors['age'] = 'age is required';
		}
		else{
		$age = $_POST['age'];
			if(!preg_match('/^[0-9][0-9]$/', $age)){
				$errors['age'] = 'enter a valid age';
		}
	}
	if(array_filter($errors)){
		echo "YES";
	}
	else{ 
		$name=mysqli_real_escape_string($conn,$_POST['name']);
		$source=mysqli_real_escape_string($conn,$_POST['source']);
		$destination=mysqli_real_escape_string($conn,$_POST['destination']);
		$contactnum=mysqli_real_escape_string($conn,$_POST['contactnum']);
		$age=mysqli_real_escape_string($conn,$_POST['age']);
        echo $name;
        echo $source;
        echo $destination;
        echo $contactnum;
        echo $age;
        if($source=="DEVARAJ URS ROAD"&&$destination=="BUS STAND")
        {
        	$price=200;
        	$taxi=1234;
        	$driver_id=1;
        }
        if($source=="NIE COLLEGE"&&$destination=="RAILWAY STATION")
        {
        	$price=70;
        	$taxi=1235;
        	$driver_id=2;
        }
        if($source=="MYSORE PALACE"&&$destination=="CHAMUNDI HILLS")
        {
        	$price=250;
        	$taxi=1236;
        	$driver_id=3;
        }
        if($source=="VIDYARANYAPURA"&&$Destination=="HEBBAL")
        {
        	$price=160;
        	$taxi=1237;
        	$driver_id=4;
        }
        if($source=="DEVARAJ URS ROAD"&&$destination=="HEBBAL")
        {
        	$price=140;
        	$taxi=1238;
        	$driver_id=5;
        }
        if($source=="DEVARAJ URS ROAD"&&$destination=="CHAMUNDI HILLS")
        {
        	$price=220;
        	$taxi=1239;
        	$driver_id=6;
        }
        if($source=="DEVARAJ URS ROAD"&&$destination=="RAILWAY STATION")
        {
        	$price=65;
        	$taxi=1240;
        	$driver_id=7;
        }
        if($source=="NIE COLLEGE"&&$destination=="CHAMUNDI HILLS")
        {
        	$price=200;
        	$taxi=1241;
        	$driver_id=8;
        }
        if($source=="NIE COLLEGE"&&$destination=="HEBBAL")
        {
        	$price=260;
        	$taxi=1242;
        	$driver_id=9;
        }
        if($source=="NIE COLLEGE"&&$destination=="BUS STAND")
        {
        	$price=75;
        	$taxi=1243;
        	$driver_id=10;
        }
        if($source=="VIDYARANYAPURA"&&$destination=="CHAMUNDI HILLS")
        {
        	$price=240;
        	$taxi=1244;
        	$driver_id=11;
        }
        if($source=="VIDYARANYAPURA"&&$destination=="BUS STAND")
        {
        	$price=70;
        	$taxi=1245;
        	$driver_id=12;
        }
        if($source=="VIDYARANYAPURA"&&$destination=="RAILWAY STATION")
        {
        	$price=75;
        	$taxi=1246;
        	$driver_id=13;
        }
        if($source=="MYSORE PALACE"&&$destination=="HEBBAL")
        {
        	$price=180;
        	$taxi=1247;
        	$driver_id=14;
        }
        if($source=="MYSORE PALACE"&&$destination=="RAILWAY STATION")
        {
        	$price=60;
        	$taxi=1248;
        	$driver_id=15;
        }
        if($source=="MYSORE PALACE"&&$destination=="BUS STAND")
        {
        	$price=40;
        	$taxi=1249;
        	$driver_id=16;
        }

		$sql="insert into booktaxi(name,source,destination,contactnum,age,driver_id,taxi_no,price) values('$name','$source','$destination','$contactnum','$age','$driver_id','$taxi','$price')";
		if(mysqli_query($conn,$sql))
		{
			header("Location:newtripdetails.php");
		}
	}
					
	}
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>	
 <section class="container grey-text">
  			<h4 class="center">BOOK TAXI</h4>

		<form class="white" action="newbooktaxi.php" method="POST">
			<label>NAME</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>SOURCE</label>
			<input type="text" name="source" value="<?php echo htmlspecialchars($source) ?>">
			<div class="red-text"><?php echo $errors['source']; ?></div>
			<label>DESTINATION</label>
			<input type="text" name="destination" value="<?php echo htmlspecialchars($destination) ?>">
			<div class="red-text"><?php echo $errors['destination']; ?></div>
			<label>CONTACT NO.</label>
			<input type="number" name="contactnum" value="<?php echo htmlspecialchars($contactnum) ?>">
			<div class="red-text"><?php echo $errors['contactnum']; ?></div>
			<label>AGE</label>
			<input type="number" name="age" value="<?php echo htmlspecialchars($age) ?>">
			<div class="red-text"><?php echo $errors['age']; ?></div>
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