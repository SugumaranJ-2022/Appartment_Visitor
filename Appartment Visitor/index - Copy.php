<?php 
session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Appartment Visitors Management System</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body style="background-image:url(images/2.jpg);">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">AVMS</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				
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
				<li class='active'><a href='#'><h3>AVMS</h3></a></li>	
				<li style='background-color:#000'><a href='#'>Flat Owners</a></li>						
				<li style='background-color:#000'><a href='#'>Search Flat Owners</a></li>						
				<li style='background-color:#000'><a href='#'>Repetitive Visitor</a></li>						
				<li style='background-color:#000'><a href='#'>Visitor</a></li>						
				<li style='background-color:#000'><a href='#'>Security Details</a></li>						
				<li style='background-color:#000'><a href='#'>Events And Celebrities</a></li>					
				<li style='background-color:#000'><a href='#'>Visitor Messages</a></li>						
				<li style='background-color:#000'><a href='#'>Log Out</a></li>						
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
				<div class="panel panel-info">
					<div class="panel-heading">Visitor Details</div>
						<div class="panel-body">
                      

				<div class='col-md-3'>
								
								<div class='panel panel-primary'>
									<div class='panel-heading'>Todays Visitor</div>
									<div class='panel-body'>
									<div class="overview__inner">
									</div>
										<p>Visitors : 0	</p>									
									</div>										
									<div></div>
									<div class = 'panel-footer' style='background-image:url(images/1.jpg)'></div>										
								</div>
								
				</div>
						

				<div class='col-md-3'>
								
								<div class='panel panel-primary'>
									<div class='panel-heading'>Yesterday Visitor</div>
									<div class='panel-body'>
									<div class="overview__inner">
									</div>
										<p>Visitors : 0	</p>									
									</div>										
									<div></div>
									<div class = 'panel-footer' style='background-image:url(images/1.jpg)'></div>										
								</div>
								
				</div>

				
				<div class='col-md-3'>
								
								<div class='panel panel-primary'>
									<div class='panel-heading'>Last One Week Visitor</div>
									<div class='panel-body'>
									<div class="overview__inner">
									</div>
										<p>Visitors : 0	</p>									
									</div>										
									<div></div>
									<div class = 'panel-footer' style='background-image:url(images/1.jpg)'></div>										
								</div>
								
				</div>
				
								<div class='col-md-3'>
								
								<div class='panel panel-primary'>
									<div class='panel-heading'>Total Visitor</div>
									<div class='panel-body'>
									<div class="overview__inner">
									</div>
										<p>Visitors : 0	</p>									
									</div>										
									<div></div>
									<div class = 'panel-footer' style='background-image:url(images/1.jpg)'></div>										
								</div>
								
				</div>
				
				
						</div>
						<div class="panel-footer">&copy; 2020 Appartment Visitors Management System</div>
				</div>
				
			</div>
			
		</div>
	</div>
</body>
</html>
<script>
$(document).ready(function(){
	cat();
	product();
	function cat(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
			}
			
		})
	}
	
function product(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
			
		})
	}		
	
$("body").delegate("#category","click",function(event){
	event.preventDefault();
	var cid = $(this).attr('cid');

		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
			}
			
		})
})	


$("body").delegate(".product","click",function(event){
event.preventDefault();
var p_id= $(this).attr('pid');

		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{addToProduct:1,proId:p_id},
			success	:	function(data){
				alert(data);
			}
			
		})
		
})		
$("#login").click(function(event){
	event.preventDefault();
	var email = $("#email").val();
	var pass = $("#password").val();
alert("hi");	
	$.ajax({
			url		:	"login.php",
			method	:	"POST",
			data	:	{UserLogin:1,userEmail:email,userPassword:pass},
			success	:	function(data){
					if(data == "Welcome To Petzone")
					{
						window.location.href="profile.php";
					}
			}
			
		})
})



	
	
})

</script>