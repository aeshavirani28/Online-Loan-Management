<?php 
	include 'db_connect.php'; // Ensure this file contains the correct DB connection
	?>

	<div class="container-fluid">
		<div class="row"></div>
		<br>
		<div class="row">
			<div class="card col-lg-12">
				<div class="card-body">
					<table class="table-striped table-bordered col-md-12 col-lg-12">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">ID</th>
								<th class="text-center">First Name</th>
								<th class="text-center">Last Name</th>
								<th class="text-center">Address</th>
								<th class="text-center">Date of Birth</th>
								<th class="text-center">Gender</th>
								<th class="text-center">Age</th>
								<th class="text-center">Contact</th>
								<th class="text-center">Email</th>
								<th class="text-center">Password (Hashed)</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Fetch all users ordered by first_name (since username doesn't exist)
							$user = $conn->query("SELECT * FROM user ORDER BY first_name ASC");

							if (!$user) {
								die("<p style='color:red;'>Query Failed: " . $conn->error . "</p>");
							}

							$i = 1;
							while ($row = $user->fetch_assoc()):
							?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><?php echo htmlspecialchars($row['id']) ?></td>
									<td><?php echo htmlspecialchars($row['first_name']) ?></td>
									<td><?php echo htmlspecialchars($row['last_name']) ?></td>
									<td><?php echo htmlspecialchars($row['address']) ?></td>
									<td><?php echo htmlspecialchars($row['dob']) ?></td>
									<td><?php echo htmlspecialchars($row['gender']) ?></td>
									<td><?php echo htmlspecialchars($row['age']) ?></td>
									<td><?php echo htmlspecialchars($row['contact']) ?></td>
									<td><?php echo htmlspecialchars($row['email']) ?></td>
									<td><?php echo password_hash($row['password'], PASSWORD_DEFAULT) ?></td>
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
