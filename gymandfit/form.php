<?php
$db_host="localhost";
$db_user="id15313117_root";
$db_password="A@r@v123456789";
$db_name="id15313117_project";

	$conn= mysqli_connect($db_host, $db_user, $db_password, $db_name);
	if(!$conn)
	{
		die("connection failed");
	}
	if(isset($_REQUEST['submit'])){
		if(($_REQUEST['First_name'] == "") || ($_REQUEST['Last_name'] == "") || ($_REQUEST['email'] == "")){
		}
	    else{
	    	$fn = isset($_REQUEST['First_name'])? $_REQUEST['First_name']:'';
		    $ln = isset($_REQUEST['Last_name'])? $_REQUEST['Last_name']:'';
		    $em = isset($_REQUEST['email'])? $_REQUEST['email']:'';
		    $gender = isset($_REQUEST['Gender'])? $_REQUEST['Gender']:'';
		    $Membership = isset($_REQUEST['Membership'])? $_REQUEST['Membership']:'';
		    $fn=md5($fn);
		    $ln=md5($ln);
		    $em=md5($em);
		    $fn=mysqli_real_escape_string($conn, $fn);
		    $ln=mysqli_real_escape_string($conn, $ln);
		    $em=mysqli_real_escape_string($conn, $em);
		    $sql= "INSERT INTO registration (first_name, last_name, email, gender, membership) VALUES( '$fn', '$ln', '$em', '$gender', '$Membership')";
		    if(mysqli_query($conn, $sql)){
		        header('location:Thankyou.html');
		    }
		    else{
		    	echo "unable to insert record";
		    }
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>form</title>
	<link rel="stylesheet" type="text/css" href="styleform.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<section>
	<style src="js/bootstrap.js"></style>
	 <div  class="container">
	<div class="row mt-5">
	<div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left">
	<h3 class="display-3 text-white">Sign Up<i class="fas fa-arrow-circle-right"></i></h3>
    <hr>
    <div class="card">
    <div class="card-body">
    <h6 class="text-secondary style" style="font-size: 30px;">We welcome you all into the world of Fitness and by registering here you are assuring yourself a world class environment designed to bring out your fittest self.</h6>
    <h3 class="display-3">GET READY!</h3>
    </div>
    </div>
    </div>
    <div class="col-md-6 col-xl-5 mb-4">
    <div class="card">
    <div class="card-body">
    	<div class="text-center">
    		<h3 class="text-secondary display-3">Register:</h3>
            <hr>
        </div>
        <form action="form.php" class="border border-light" method="POST">
		<div class="form-group" >
			<i class="fas fa-user"></i>
			<label for="First_name" class="display-1 white-text"><h4>First Name:</h4></label>
			<input type="text" name="First_name" class="white-text form-control" placeholder="First Name" required>
		</div>
		<hr>
		<div class="form-group">
			<i class="fas fa-user"></i>
			<label for="Last_name" class="display-4 white-text"><h4>Last Name:</h4></label>
			<input type="text" name="Last_name" class="white-text form-control" placeholder="Last Name" required>
		</div>
		<hr>
		<div class="form-group">
            <i class="fas fa-envelope"></i>
            <label for="email" class="display-4 white-text"><h4>Email:</h4></label>
            <input type="email" name="email" class="white-text form-control" placeholder="Email" required>
        </div>
		<hr>
		<div class="form-group">
			<label class="display-4" id="Gender"><h4><i class="fas fa-venus"></i>Gender</h4></label><br>
			<label class="display-4" style="font-size: 20px;"><input type="checkbox" name="Gender" value="m">Male</label>&nbsp;
			<label class="display-4" style="font-size: 20px;"><input type="checkbox" name="Gender" value="f">Female</label>&nbsp;
			<label class="display-4" style="font-size: 20px;"><input type="checkbox" name="Gender" value="h">Homo</label>&nbsp;
		</div>
		<hr>
		<div class="form-group">
			<label class="display-4"><h4><i class="fas fa-dumbbell"></i>Membership</h4></label><br>
			<label class="display-4" style="font-size: 20px;"><input type="checkbox" name="Membership" value="s">Silver</label>&nbsp;
			<label class="display-4" style="font-size: 20px;"><input type="checkbox" name="Membership" value="g">Gold</label>&nbsp;
			<label class="display-4" style="font-size: 20px;"><input type="checkbox" name="Membership" value="d">Diamond</label>&nbsp;
		</div>
		<hr>
		<div class="text-center">
			<button class="btn btn-outline-secondary" type="Submit" id="btn" name="submit">Submit</button>
		</div>
	 </form>
	</div>
    </div>
    </div>
	</div>
	</div>
</section>
<script src="https://kit.fontawesome.com/d5f8b6c1a9.js" crossorigin="anonymous"></script>
</body>
</html>
