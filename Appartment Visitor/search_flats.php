<?php
session_start();
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
}
$_SESSION['msg']="";
require "Connection.php";
If(isset($_GET['edit']))
{
	$id=$_GET['edit'];
	$rec=mysqli_query($con,"select * from security_details where sid=$id");
	$record=mysqli_fetch_array($rec);
	$txtname = $record['Name'];
	$txtaddress = $record['Address'];
	
	
	$txtmobile = $record['Mobile'];
	$txtemail= $record['Email'];
	$txtdetails = $record['Details'];
	$id=$record['sid'];
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
					<div class="panel-heading text-center">Security Details</div>
					<div class="panel-body"> 
						<form method="post" enctype="multipart/form-data" action="#">
						
						<div class="row">
							<div class="col-md-12">
								<label for="Name">Name</label>
								<input type="text" class="form-control" id="txtname" name="txtname" required>						<p></br></p>
								<button type="submit" id="btnsave"  name="btnsave" class="btn btn-success btn-md center-block">Search</button>			
							</div>

						</div>
						<p></br></p>
						<div class="row">	

						</div>
						
						
						
						
						
						
						
						
		<div class="col-md-12">		
			<table class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Name</th>
						<th>Flat No</th>
						<th>Designation</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Details</th>		
					</tr>
				</thead>
				<tbody>
					<?php 
							if(isset($_POST['btnsave']))
				{
					$txtname	= 	$_POST['txtname'];
				// Show Records
					$results = mysqli_query($con,"select * from flatowners where Name='$txtname'");

						while ($row=mysqli_fetch_array($results))
						{
							?>
							<tr>
								<td><?php echo $row['Name']; ?></td>
								<td><?php echo $row['FlatNo']; ?></td>
								<td><?php echo $row['Designation']; ?></td>
								<td><?php echo $row['Mobile']; ?></td>
								<td><?php echo $row['Email']; ?></td>
								<td><?php echo $row['Details']; ?></td>
							</tr>							
					<?php 
						}
				}
					?>

				</tbody>
			</table>
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
