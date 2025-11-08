<?php
session_start();
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
}
$_SESSION['msg']="";
require "Connection.php";
$txtname = "";
$txtaddress ="";

$txtdetails="";

$txtmobile="";
$txtemail="";

$id=0;
$edit_state=false;


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
if(isset($_POST['btnsave']))
{
	
$txtname	= 	$_POST['txtname'];

$txtaddress=$_POST['txtaddress'];
$txtdetails=$_POST['txtdetails'];
$txtmobile=$_POST['txtmobile'];
$txtemail=$_POST['txtemail'];

		mysqli_query($con,"insert into security_details set 						
						Name			=	'$txtname',
						Address	=	'$txtaddress',						
						Mobile			=	'$txtmobile',
						Email			=	'$txtemail',
						Details		=	'$txtdetails'")or die('Query Not Working 2 : '.mysql_error());

						$_SESSION['msg']="Record Saved";
						
	header("location: securities.php");

}
//Update Record
if(isset($_POST['btnedit']))
{


$txtname	= 	$_POST['txtname'];

$txtaddress=$_POST['txtaddress'];
$txtdetails=$_POST['txtdetails'];
$txtmobile=$_POST['txtmobile'];
$txtemail=$_POST['txtemail'];

$id=$_POST['id'];

mysqli_query($con,"update security_details set Name='$txtname',Address='$txtaddress',Mobile='$txtmobile',Email='$txtemail',Details='$txtdetails' where sid='$id'");
	
	header("location: securities.php");

}

//Delete Record
if(isset($_POST['btndelete']))
{
$id=$_POST['id'];
mysqli_query($con,"delete from security_details where sid='$id'");
header("location: securities.php");
}

// Show Records
$results = mysqli_query($con,"select * from security_details");

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
			<table class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Details</th>
				
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						
						while ($row=mysqli_fetch_array($results))
						{
							?>
							<tr>
								<td><?php echo $row['Name']; ?></td>
								<td><?php echo $row['Address']; ?></td>
								
								<td><?php echo $row['Mobile']; ?></td>
								<td><?php echo $row['Email']; ?></td>
								<td><?php echo $row['Details']; ?></td>
								
				
								<td><a style="text-decoration:none;padding:2px 5px;color:#0099cc;border-radius:3px;backgroud:#800000;" href="securities.php?edit=<?php echo $row['sid']; ?>">Show</a></td>
								
							</tr>							
					<?php 
						}
					?>

				</tbody>
			</table>
		</div>
			
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">Security Details</div>
					<div class="panel-body"> 
						<form method="post" enctype="multipart/form-data" action="#">
						<input type="hidden" name="id" value=" <?php echo $id; ?>">
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Name</label>
								<input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $txtname; ?>" required>
							</div>

							<div class="col-md-6">
								<label for="Name">Address</label>
								<input type="text" class="form-control" id="txtaddress" name="txtaddress" value="<?php echo $txtaddress; ?>" required>
							</div>														
						</div>
				
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Mobile</label>
								<input type="number" class="form-control" id="txtmobile" name="txtmobile" value="<?php echo $txtmobile; ?>" required>
							</div>							
							<div class="col-md-6">
								<label for="Name">Email</label>
								<input type="email" class="form-control" id="txtemail" name="txtemail" value="<?php echo $txtemail; ?>" required>
							</div>
						</div>						
						<div class="row">

							<div class="col-md-12">
								<label for="Name">Details</label>
								<input type="text" class="form-control" id="txtdetails" name="txtdetails" value="<?php echo $txtdetails; ?>" required>
							</div>
						</div>						
						<p></br></p>
						<div class="row">
							<div class="col-md-3">
							</div>
							<div class="col-md-2">																
								<button type="submit" id="btnsave"  name="btnsave" class="btn btn-success btn-md center-block">Save</button>			
							</div>
							<div class="col-md-2">																
								<button type="submit" id="btnedit"  name="btnedit" class="btn btn-success btn-md center-block">Update</button>			
							</div>
							<div class="col-md-2">																
								<button type="submit" id="btndelete"  name="btndelete" class="btn btn-success btn-md center-block">Delete</button>			
							</div>
							<div class="col-md-3">
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
