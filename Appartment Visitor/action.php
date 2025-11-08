<?php
session_start();
include "Connection.php";

if(isset($_POST["getProduct"]))
{
	$product_query = "select * from products  order by RAND() limit 0,6";
	$run_query = mysql_query($product_query);
	if(mysql_num_rows($run_query) > 0)
	{
		while($row = mysql_fetch_array($run_query))
		{
			$prod_id=$row["productid"];
			$prod_title=$row["product_title"];
			$prod_price=$row["product_price"];
			$prod_image=$row["product_image"];
			echo "	
				<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_title</div>
									<div class='panel-body'>
										<img src='product_images/$prod_image' style='width:160px; height:250px;'/>
									</div>
									<div class='panel-heading'>$prod_price
										<button pid='$prod_id' style='float:right;' class='product' class='btn btn-danger btn-xs'>AddToCart</button>
									</div>
								</div>
				</div>
			";
		}
	}
}

if(isset($_POST["getProduct1"]))
{
	$product_query = "select * from products";
	$run_query = mysql_query($product_query);
	if(mysql_num_rows($run_query) > 0)
	{
		while($row = mysql_fetch_array($run_query))
		{
			$uid=$row["productid"];
			$name=$row["product_title"];
			$price=$row["product_price"];
			$image=$row["product_image"];
			$details=$row["product_desc"];
			echo "	
				<div class='col-md-12'>
								<div class='panel panel-info'>
									<div class='panel-heading'></div>
									<div class='panel-body'>
									
						<table class='table table-striped'>
							<thead class='thead-dark'>
							<td>Product Id</td>
							<td>Product Name</td>							
							<td>Price</td>
							<td>Image</td>
							<td>Details</td>
							</thead>
							<tr>
								<td>$uid</td>
								<td>$name</td>
								<td>$price</td>
								<td><img src='product_images/$image' style='height:100px;width100px;'/></td>
								<td>$details</td>
							</tr>
						</table>	
						
									</div>
									<div class='panel-heading'>
										
									</div>
								</div>
				</div>
			";
		}
	}
}


if(isset($_POST["getinvoice"]))
{
	$product_query = "select * from invoice where invoiceid > 0";
	$run_query = mysql_query($product_query);
	if(mysql_num_rows($run_query) > 0)
	{
		while($row = mysql_fetch_array($run_query))
		{
			$uid=$row["invoiceid"];
			$name=$row["ClientName"];
			$bankname=$row["bank_name"];
			$totamt=$row["price"];
			
			echo "	
				<div class='col-md-12'>
								<div class='panel panel-info'>
									<div class='panel-heading'></div>
									<div class='panel-body'>
									
						<table class='table table-striped'>
							<thead class='thead-dark'>
							<td>Invoice Id</td>
							<td>Client Name</td>							
							<td>Bank Name</td>
							<td>Price</td>
							</thead>
							<tr>
								<td>$uid</td>
								<td>$name</td>
								<td>$bankname</td>								
								<td>$totamt</td>
							</tr>
						</table>	
						
									</div>
									<div class='panel-heading'>
										
									</div>
								</div>
				</div>
			";
		}
	}
}


if(isset($_POST["getstock"]))
{
	$product_query = "select * from products where qty > 0";
	$run_query = mysql_query($product_query);
	if(mysql_num_rows($run_query) > 0)
	{
		while($row = mysql_fetch_array($run_query))
		{
			$uid=$row["productid"];
			$name=$row["product_title"];
			$bankname=$row["product_price"];
			$totamt=$row["qty"];
			
			echo "	
				<div class='col-md-12'>
								<div class='panel panel-info'>
									<div class='panel-heading'></div>
									<div class='panel-body'>
									
						<table class='table table-striped'>
							<thead class='thead-dark'>
							<td>Product Id</td>
							<td>Product Title</td>							
							<td>Product Price</td>
							<td>Qty</td>
							</thead>
							<tr>
								<td>$uid</td>
								<td>$name</td>
								<td>$bankname</td>								
								<td>$totamt</td>
							</tr>
						</table>	
						
									</div>
									<div class='panel-heading'>
										
									</div>
								</div>
				</div>
			";
		}
	}
}


if(isset($_POST["getProduct_selected"]))
{
	$uid = $_SESSION["uid"];
	$product_query = "select * from cart where user_id='$uid'";
	$run_query = mysql_query($product_query);
	if(mysql_num_rows($run_query) > 0)
	{
		while($row = mysql_fetch_array($run_query))
		{			
			$prod_title=$row["product_title"];			
			$prod_image=$row["product_image"];
			$prod_price=$row["price"];
			echo "	
				<div class='col-md-4'>
								
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_title</div>
									<div class='panel-body'>
										<img src='product_images/$prod_image' style='width:160px; height:250px;'/>
									</div>
									<div class='panel-heading'>$prod_price
								
									</div>
								</div>
				</div>
			";
		}
	}
}



if(isset($_POST["category"])){
	$category_query="select * from categories";
	$run_query=mysql_query($category_query);
	echo "
			<div class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'><h3>AVMS</h3></a></li>	
	";
	
	if(mysql_num_rows($run_query) > 0)
	{
		while($row = mysql_fetch_array($run_query))
		{
			$cid = $row["cat_id"];
			$cat_name = $row["details"]; 
			echo "
				<li style='background-color:#000'><a href='#' cid='$cid' id='category'>$cat_name</a></li>						
			";
		}
		echo "</div>";
	}
}

if(isset($_POST["get_seleted_Category"])){
	$cid = $_POST["cat_id"];
	$sql = "select * from products where product_cat='$cid'";
	$run_query = mysql_query($sql);
	while($row = mysql_fetch_array($run_query))
		{
			$prod_id=$row["productid"];
			$prod_title=$row["product_title"];
			$prod_price=$row["product_price"];
			$prod_image=$row["product_image"];
			echo "	
				<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_title</div>
									<div class='panel-body'>
										<img src='product_images/$prod_image' style='width:160px; height:250px;'/>
									</div>
									<div class='panel-heading'>$prod_price
										<button pid='$prod_id' class='product' style='float:right;' class='btn btn-danger btn-xs'>AddToCart</button>
									</div>
								</div>
				</div>
			";
		}
}


if(isset($_POST["addToProduct"])){
	$p_id = $_POST["proId"];
	$user_id = $_SESSION["uid"];
	$sql = "select  * from cart where p_id = '$p_id' and user_id= '$user_id'";
	$run_query = mysql_query($sql);
	$count = mysql_num_rows($run_query);
	if($count > 0 )
	{
		echo "Product Is Already Added";
	}
	else
	{
		$sql = "select  * from products where productid = '$p_id'";
		$run_query = mysql_query($sql);
		$row = mysql_fetch_array($run_query);
			$id = $row["productid"];
			$pro_name = $row["product_title"];
			
			$pro_image = $row["product_image"];
			$pro_price = $row["product_price"];
			
			$sql = "insert into cart (id,p_id,user_id,product_title,product_image,qty,price,total_amt)values(Null,'$p_id','$user_id','$pro_name','$pro_image','1','$pro_price','$pro_name')";
			
				$sql1 = "insert into cart1 (id,p_id,user_id,product_title,product_image,qty,price,total_amt)values(Null,'$p_id','$user_id','$pro_name','$pro_image','1','$pro_price','$pro_name')";
				mysql_query("update products set qty = qty - '1' where productid='$p_id'");
				mysql_query($sql1);
		
			if(mysql_query($sql))
			{
				echo "Product is Added...";
			}
	}
}

?>