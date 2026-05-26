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
					<th class="text-center">Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Phone no</th>
                    <th class="text-center">Message</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
                    $type = array("","Admin","Staff","Alumnus/Alumna");
 					$contactus = $conn->query("SELECT * FROM contactus order by name asc");
 					$i = 1;
 					while($row= $contactus->fetch_assoc()):
				 ?>
				 <tr>
				 	<td>
				 		<?php echo $i++ ?>
				 	</td>
				 	<td>
				 		<?php echo $row['name'] ?>
				 	</td>
				 	<td>
				 		<?php echo $row['email'] ?>
				 	</td>
                     <td>
				 		<?php echo ucwords($row['phone']) ?>
				 	</td>
                     <td>
				 		<?php echo $row['message'] ?>
				 	</td>
				 	<!-- <td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Action</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
								  </div>
								</div>
								</center> 
				 	</td>  -->
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
