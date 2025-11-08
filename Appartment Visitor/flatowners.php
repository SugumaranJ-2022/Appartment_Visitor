<?php
session_start();
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
}
$_SESSION['msg']="";
require "Connection.php";
$txtname = "";
$txtdesignation ="";
$txtflatno="";
$txtdetails="";

$txtmobile="";
$txtemail="";

$id=0;
$edit_state=false;
If(isset($_GET['edit']))
{
	$id=$_GET['edit'];
	$rec=mysqli_query($con,"select * from flatowners where fid=$id");
	$record=mysqli_fetch_array($rec);
	$txtname = $record['Name'];
	$txtflatno = $record['FlatNo'];
	$txtdesignation= $record['Designation'];
	
	$txtmobile = $record['Mobile'];
	$txtemail= $record['Email'];
	$txtdetails = $record['Details'];
	$id=$record['fid'];
}
if(isset($_POST['btnsave']))
{
	
$txtname	= 	$_POST['txtname'];
$txtdesignation =$_POST['txtdesignation'];
$txtflatno=$_POST['txtflatno'];
$txtdetails=$_POST['txtdetails'];
$txtmobile=$_POST['txtmobile'];
$txtemail=$_POST['txtemail'];

		mysqli_query($con,"insert into flatowners set 						
						Name			=	'$txtname',
						FlatNo	=	'$txtflatno',
						Designation			=	'$txtdesignation',
						Mobile			=	'$txtmobile',
						Email			=	'$txtemail',
						Details		=	'$txtdetails'")or die('Query Not Working 2 : '.mysql_error());

						$_SESSION['msg']="Record Saved";
						
	header("location: flatowners.php");

}
//Update Record
if(isset($_POST['btnedit']))
{


$txtname	= 	$_POST['txtname'];
$txtdesignation =$_POST['txtdesignation'];
$txtflatno=$_POST['txtflatno'];
$txtdetails=$_POST['txtdetails'];
$txtmobile=$_POST['txtmobile'];
$txtemail=$_POST['txtemail'];

$id=$_POST['id'];

mysqli_query($con,"update flatowners set Name='$txtname',FlatNo='$txtflatno',Designation='$txtdesignation',Mobile='$txtmobile',Email='$txtemail',Details='$txtdetails' where fid='$id'");
	
	header("location: flatowners.php");

}

//Delete Record
if(isset($_POST['btndelete']))
{
$id=$_POST['id'];
mysqli_query($con,"delete from flatowners where fid='$id'");
header("location: flatowners.php");
}

// Show Records
$results = mysqli_query($con,"select * from flatowners");

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
						<th>Flat No</th>
						<th>Designation</th>
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
								<td><?php echo $row['FlatNo']; ?></td>
								<td><?php echo $row['Designation']; ?></td>
								<td><?php echo $row['Mobile']; ?></td>
								<td><?php echo $row['Email']; ?></td>
								<td><?php echo $row['Details']; ?></td>
								
				
								<td><a style="text-decoration:none;padding:2px 5px;color:#0099cc;border-radius:3px;backgroud:#800000;" href="flatowners.php?edit=<?php echo $row['fid']; ?>">Show</a></td>
								
							</tr>							
					<?php 
						}
					?>

				</tbody>
			</table>
		</div>
			
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">Flat Owners Details</div>
					<div class="panel-body"> 
						<form method="post" enctype="multipart/form-data" action="#">
						<input type="hidden" name="id" value=" <?php echo $id; ?>">
						<div class="row">
							<div class="col-md-4">
								<label for="Name">Name</label>
								<input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $txtname; ?>" required>
							</div>
							<div class="col-md-4">
								<label for="Name">Designation</label>
								<input type="text" class="form-control" id="txtdesignation" name="txtdesignation" value="<?php echo $txtdesignation; ?>" required>
							</div>							
							<div class="col-md-4">
								<label for="Name">Flat No</label>
								<input type="text" class="form-control" id="txtflatno" name="txtflatno" value="<?php echo $txtflatno; ?>" required>
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
