<?php 
require "Connection.php";
$sql1 ="SELECT * from eventdetails";
$result1 = mysqli_query($con,$sql1);
$output1 ='';
$output1 .= '<table class="table table-bordered table-hover table-condensed table-striped">
				<tr>					
					<th> Event Id </th>

					<th> Event Name </th>
					<th> Contact Person </th>
					<th> Flat No </th>
					<th> Event Date </th>
					
					
					
 			</tr>';

				if(mysqli_num_rows($result1) > 0)
				{
					while ($row1 =mysqli_fetch_array($result1))
					{
						
						$output1 .= '<tr><td  colspan="4" cellspacing="0" cellpadding="0">

							</td></tr>
									<tr>					

										<td>'.$row1[0].'</td>
										<td>'.$row1[1].'</td>
										<td>'.$row1[2].'</td>										
										<td>'.$row1[3].'</td>										
										<td>'.$row1[4].'</td>										
					

									</tr>';									
														};
				};
				
$output1 .= '</table>';
echo $output1;

?>		

