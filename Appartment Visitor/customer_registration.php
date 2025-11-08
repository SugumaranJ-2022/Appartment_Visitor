<?php
require "Connection.php";
if($_POST)
{
$txtname		= 	$_POST['txtname'];
$txtemail	= 	$_POST['txtemail'];
$txtpassword	= 	$_POST['txtpassword'];
$txtmobile	= 	$_POST['txtmobile'];
$txtaddress	= 	$_POST['txtaddress'];
if(empty($txtname) || empty($txtname) || empty($txtname) || empty($txtname) || empty($txtname))
{
	echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please Fill All The Fields</b>
			</div>
	";
	
}
	$role="User";
			mysql_query("insert into login values('$txtemail','$txtpassword','$role',Null)");
		mysql_query("insert into user_info set 						
						Name		=	'$txtname',
						email		=	'$txtemail',
						password		=	'$txtpassword',
						mobile		=	'$txtmobile',
						address	=	'$txtaddress'")or die('Query Not Working 2 : '.mysql_error());								
							
							
		
						header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Small Basket</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Small Basket</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>				
			</ul>
		</div>
	</div>
	<p><br></p>
	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12" id="signup_msg">
		
		</div>
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer Signup Form</div>
					<div class="panel-body"> 
						<form method="post">
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Name</label>
								<input type="text" class="form-control" id="txtname" name="txtname">
							</div>
							<div class="col-md-6">
								<label for="Name">Email</label>
								<input type="text" id="txtemail" name="txtemail" class="form-control">
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Password</label>
								<input type="password" class="form-control" id="txtpassword" name="txtpassword">
							</div>
							<div class="col-md-6">
								<label for="Name">Mobile</label>
								<input type="text" id="txtmobile" name="txtmobile" class="form-control">
							</div>							
						</div>					
						
						<div class="row">
							<div class="col-md-12">
								<label for="Name">Address</label>
								<input type="text" class="form-control" id="txtaddress" name="txtaddress">
							</div>
						</div>						
						<p></br></p>
						<div class="row">
							<div class="col-md-12">								
								<button id="btncst" style="float:right;" name="btncst" class="btn btn-success btn-lg">Signup</button>
							</div>
						</div>												
						
						
					</div>
					</form>
					<div class="panel-footer">Small Basket</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>		