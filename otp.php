<?php
session_start();
    $db_host="localhost";
    $db_user="root";
    $db_password="";
    $db_name="project";
    $fn= $_SESSION["fn"];
	$ln= $_SESSION["ln"];
	$em= $_SESSION["em"];
	$gender= $_SESSION["gender"];
	$Membership= $_SESSION["Membership"];

	$conn= mysqli_connect($db_host, $db_user, $db_password, $db_name);
	if(!$conn)
	{
		die("connection failed");
	}
	else{
	    if(isset($_POST['submit_otp'])){
	        $result=mysqli_query($conn, "SELECT * FROM otp WHERE vkey='".$_POST['otp']."' AND is_expired!=1 AND NOW() <= DATE_ADD(created_at, INTERVAL 24 HOUR)");
	        $count=mysqli_num_rows($result);
	        if(!empty($count)){
	            $rslt=mysqli_query($conn,"UPDATE otp SET is_expired=1 WHERE vkey='".$_POST['otp']."'");
	            $sql= "INSERT INTO registration(first_name, last_name, email, gender, membership) VALUES( '$fn', '$ln', '$em', '$gender', '$Membership')";
	            $reslt=mysqli_query($conn, $sql);
	            if(!empty($rslt) && !empty($reslt)){
	                header('location:Thankyou.html');
	            }
	          }
	        else{
	            header('location:otp.php');
	            echo "Invalid OTP";
	        }
	        }
	    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styleO.css">
	<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<h1 class="font text-center text-danger"><i class="fas fa-dumbbell text-danger"></i>gymandfit</h1>
	<form method="POST" action="otp.php">
	<div align="center" style="padding:0 28%;">
	    <div class="card">
	            <h2 class="font" style="font-size:25px;">EMAIL VERIFICATION</h2>
	       <div class="card-body">
	            <h3 class="display-3" style="font-size: 30px;">Enter OTP</h3>
	            <div>
	            <input class="form-control text-center" name="otp" type="number" placeholder="Enter OTP" style="width:120px;">
	            </div>
	       </div>
	       <div>
	           <button class="btn btn-outline-danger" type="Submit" name="submit_otp" style="width:100px;">Submit</button>
	       </div>
	   </div>
	   </div>
	 </form>
<script src="https://kit.fontawesome.com/d5f8b6c1a9.js" crossorigin="anonymous"></script>
</body>
</html>