
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
				<a href="#" class="navbar-brand">AVTS</a>
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
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-2">
				<div id="">
				<div class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'><h3>AVTS</h3></a></li>	
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
					<div class="panel-heading">Visitor Message Details</div>
						<div class="panel-body">
                      

								<div><?php require ("visitor_messages_result_view.php"); ?></div>
				
						</div>
						<div class="panel-footer">&copy; 2025 Appartment Visitor Tracking System</div>
				</div>
				
			</div>
			
		</div>
	</div>
</body>
</html>		