<?php
session_start();
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
}
$_SESSION['msg']="";
require "Connection.php";

if(isset($_POST['btnsave']))
{
	
$txteventname	= 	$_POST['txteventname'];

$txtconperson=$_POST['txtconperson'];
$txtflatno=$_POST['txtflatno'];
$txteventdate=$_POST['txteventdate'];


		mysqli_query($con,"insert into eventdetails set 						
						EventName			=	'$txteventname',
						ConPerson	=	'$txtconperson',						
						FlatNo			=	'$txtflatno',						
						EventDate		=	'$txteventdate'")or die('Query Not Working 2 : '.mysql_error());

						$_SESSION['msg']="Record Saved";
						
	header("location: events.php");

}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Appartment Visitor Tracking System</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body style="background-image:url(images/2.jpg);">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="MasterAdmin.php" class="navbar-brand">AVTS</a>
			</div>
			<ul class="nav navbar-nav">
				
				
			</ul>
			<ul class="nav navbar-nav navbar-right">


				<li><a href="login.php">SignIn</a>

				</li>
			</ul>			
		</div>
	</div>
<p><br></p>
<p><br></p>

	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2">
				<div id="">
				<div class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'><h3>AVTS</h3></a></li>	
				<li style='background-color:#000'><a href='flatowners.php'>Flat Owners</a></li>						
				<li style='background-color:#000'><a href='search_flats.php'>Search Flat Owners</a></li>						
				<li style='background-color:#000'><a href='rvisitor.php'>Repetitive Visitor</a></li>										
				<li style='background-color:#000'><a href='securities.php'>Security Details</a></li>						
				<li style='background-color:#000'><a href='events.php'>Events And Celebrities</a></li>					
				<li style='background-color:#000'><a href='visitor_messages.php'>Visitor Messages</a></li>						
				<li style='background-color:#000'><a href='logout.php'>Log Out</a></li>						
				</div>
				</div>

				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li> 
					<li><a href="#">Products</a></li> 
				</div>-->
				
			</div>

			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">Events Details</div>
					<div class="panel-body"> 
						<form method="post" enctype="multipart/form-data" action="#">
							
						<div class="row">
							<div class="col-md-3">
								<label for="Name">Event Name</label>
								<input type="text" class="form-control" id="txteventname" name="txteventname" required>
							</div>

							<div class="col-md-3">
								<label for="Name">Con Name</label>
								<input type="text" class="form-control" id="txtconperson" name="txtconperson" required>
							</div>														
							<div class="col-md-3">
								<label for="Name">Flat No</label>
								<input type="text" class="form-control" id="txtflatno" name="txtflatno" required>
							</div>
							<div class="col-md-3">
								<label for="Name">Event Date</label>
								<input type="date" class="form-control" id="txteventdate" name="txteventdate" required>
							</div>																				
						</div>
				
						<p></br></p>
						<div class="row">
							<div class="col-md-5">
							</div>
							<div class="col-md-2">																
								<button type="submit" id="btnsave"  name="btnsave" class="btn btn-success btn-md center-block">Save</button>			
							</div>
							<div class="col-md-2">																

							</div>

						</div>																		
						</div>
					</form>
					
				</div>
			</div>
			
		</div>
		<div><?php include_once("footer.php"); ?></div>
	</div>
</body>
</html>		
