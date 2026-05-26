<?php 

?>

<div class="container-fluid">
	
	<div class="row">

	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Bank Name</th>
					<th class="text-center">Branch Name</th>
					<th class="text-center">Account Holder Name</th>
                    <th class="text-center">Account Number</th>
					<th class="text-center">IFSC Code</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
                    $type = array("","Admin","Staff","Alumnus/Alumna");
 					$bank_details = $conn->query("SELECT * FROM bank_details order by bank_name asc");
 					$i = 1;
 					while($row= $bank_details->fetch_assoc()):
				 ?>
				 <tr>
				 	<td>
				 		<?php echo $i++ ?>
				 	</td>
				 	<td>
				 		<?php echo $row['bank_name'] ?>
				 	</td>
                     <td>
				 		<?php echo $row['branch_name'] ?>
				 	</td>
					 <td>
				 		<?php echo $row['account_holder'] ?>
				 	</td>
					 <td>
				 		<?php echo $row['account_number'] ?>
				 	</td>
					 <td>
				 		<?php echo $row['ifsc_code'] ?>
				 	</td>
				 	
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>
<script>
	$('table').dataTable();
</script>
</div>
