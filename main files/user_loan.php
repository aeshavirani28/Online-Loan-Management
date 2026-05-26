<!DOCTYPE html>
<html>
<head>
	<title>Loan Application Form</title>
	
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		form {
			background-color: white;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			width: 500px;
			margin: 0 auto;
		}

		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}

		input[type="number"],
		select {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 20px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		.calculate-btn {
			background-color: green;
			color: white;
			font-weight: bold;
			padding: 10px;
			margin-top: 10px;
			border-color: green;
}

	</style>
</head>
<body>
<?php
   include ('connection.php');
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$ref_no = $_POST["ref_no"];
	$loan_type_id = $_POST["loan_type_id"];
	$borrower_id = $_POST["borrower_id"];
	$plan_id = $_POST["plan_id"];
	$purpose = $_POST["purpose"];
	$amount = $_POST["amount"];
	

    $sql = "INSERT INTO loan_list (ref_no, loan_type_id, borrower_id, plan_id, purpose, amount) VALUES ('$ref_no', '$loan_type_id', '$borrower_id', '$plan_id', '$purpose', '$amount')";
  
	if ($conn->query($sql) === TRUE) {
		header('Location: bank_details.php');
		exit;
	  } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
	}

   if(isset($_GET['id'])){
   $qry = $conn->query("SELECT * FROM loan_list where id = ".$_GET['id']);
   foreach($qry->fetch_array() as $k => $v){
	   $$k = $v;
   }
   }



?>

	<form method="post" id="loan-application">
		<label class="control-label">Reference ID:</label>
<input type="number" name="ref_no" id="ref_no" value="<?php echo rand(100000, 999999); ?>" readonly required>


		<label for="borrower">Borrower:</label>
		<?php
				$borrower = $conn->query("SELECT *,concat(lastname,' ',firstname,' ',middlename) as name FROM borrowers order by concat(lastname,', ',firstname,' ',middlename) asc ");

				?>
				<select name="borrower_id" id="borrower_id" class="custom-select browser-default select2" required>
					<option value=""></option>
					<?php while($row = $borrower->fetch_assoc()): ?>

							<option value="<?php echo $row['id'] ?>" <?php echo isset($borrower_id) && $borrower_id == $row['id'] ? "selected" : '' ?>><?php echo $row['name'] . ' | Tax ID:'.$row['tax_id'] ?></option>
						<?php endwhile; ?>
				</select
        ?>
		<div class="col-md-6">
				<label class="control-label">Loan Type</label>
				<?php
				$type = $conn->query("SELECT * FROM loan_types order by `type_name` desc ");
				?>
				<select name="loan_type_id" id="loan_type_id" class="custom-select browser-default select2" required>
					<option value=""></option>
						<?php while($row = $type->fetch_assoc()): ?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($loan_type_id) && $loan_type_id == $row['id'] ? "selected" : '' ?>><?php echo $row['type_name'] ?></option>
						<?php endwhile; ?>
				</select>
			</div>
		<div>
		   <label for="loan_plan">Loan Plan:</label>
		    <?php
				$plan = $conn->query("SELECT * FROM loan_plan order by `months` desc ");
				?>
				<select name="plan_id" id="plan_id" class="custom-select browser-default select2" required>
					<option value=""></option>
						<?php while($row = $plan->fetch_assoc()): ?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($plan_id) && $plan_id == $row['id'] ? "selected" : '' ?> data-months="<?php echo $row['months'] ?>" data-interest_percentage="<?php echo $row['interest_percentage'] ?>" data-penalty_rate="<?php echo $row['penalty_rate'] ?>"><?php echo $row['months'] . ' month/s [ '.$row['interest_percentage'].'%, '.$row['penalty_rate'].'% ]' ?></option>
						<?php endwhile; ?>
				</select>
				<small>months [ interest%,penalty% ]</small>
		</div>
		<br>
		<label for="purpose">Purpose:</label>
		<textarea name="purpose" id="" cols="30" rows="2" class="form-control"><?php echo isset($purpose) ? $purpose : '' ?></textarea>

		<!-- <input type="hidden" name="loan_type_id" value="<?php echo isset($_GET['loan_type_id']) ? $_GET['loan_type_id'] : ''; ?>" > -->


		<label for="loan_amount">Loan Amount:</label>
		<input type="number" name="amount" class="form-control text-right" step="any" id="" value="<?php echo isset($amount) ? $amount : '' ?>" id="amount" pattern="[0-9]+([\.][0-9]+)?" min="0" step="0.01" required><br>
		
		<div class="form-group col-md-2 offset-md-2 justify-content-center">
			<label class="control-label">&nbsp;</label>
			<button class="btn btn-primary btn-sm btn-block align-self-end calculate-btn" type="button" id="calculate">Calculate</button>
       </div>

		</div>
		<div id="user_calculation">
			
		</div>
		<?php if(isset($status)): ?>
		<div class="row">
			<div class="form-group col-md-6">
				<label class="control-label">&nbsp;</label>
				<select class="custom-select browser-default" name="status">
					<option value="0" <?php echo $status == 0 ? "selected" : '' ?>>For Approval</option>
					<option value="1" <?php echo $status == 1 ? "selected" : '' ?>>Approved</option>
					<?php if($status !='4' ): ?>
					<option value="2" <?php echo $status == 2 ? "selected" : '' ?>>Released</option>
					<?php endif ?>
					<?php if($status =='2' ): ?>
					<option value="3" <?php echo $status == 3 ? "selected" : '' ?>>Complete</option>
					<?php endif ?>
					<?php if($status !='2' ): ?>
					<option value="4" <?php echo $status == 4 ? "selected" : '' ?>>Denied</option>
					<?php endif ?>
				</select>
			</div>
		</div>
		<hr>
	<?php endif ?>
		
 <br>
	<div id="row-field">
  <div class="row">
    <div class="col-md-12 text-center">
      <button class="save"  style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; padding: 10px; width:70px;">next</button>
      <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" onclick="window.location.href='loan_details.php'" style="background-color: #6c757d; color: #fff; border: none; border-radius: 5px; padding: 10px;">Cancel</button>
    </div>
  </div>
</div>
<script>
	document.getElementById('loan-form').addEventListener('submit', function(event) {
    // Prevent default form submission
    event.preventDefault();
    
    // Validate the form fields
    if (this.checkValidity()) {
        // Submit the form if all fields are valid
        this.submit();
    } else {
        // Display an error message if some fields are invalid
        alert('Please fill in all required fields and correct any invalid data.');
    }
});

</script>
		<script>
  document.getElementById('calculate').addEventListener('click', function() {
    // Get the loan amount
    const loanAmount = parseFloat(document.getElementsByName('amount')[0].value);

    // Get the loan plan data
    const planSelect = document.getElementById('plan_id');
    const planId = parseInt(planSelect.value);
    const months = parseInt(planSelect.options[planSelect.selectedIndex].getAttribute('data-months'));
    const interestPercentage = parseFloat(planSelect.options[planSelect.selectedIndex].getAttribute('data-interest_percentage'));
    const penaltyRate = parseFloat(planSelect.options[planSelect.selectedIndex].getAttribute('data-penalty_rate'));

    // Get the loan type data
    const typeSelect = document.getElementById('loan_type_id');
    const typeId = parseInt(typeSelect.value);

    // Calculate the monthly payment
    const interestRate = interestPercentage / 100;
    const monthlyInterestRate = interestRate / 12;
	const monthlyPayment = loanAmount * monthlyInterestRate / (1 - Math.pow(1 + monthlyInterestRate, -months));




    // Calculate the total payable amount
    const totalPayableAmount =(loanAmount*interestPercentage/100) + loanAmount;

    // Calculate the penalty amount
    const penaltyAmount = loanAmount * penaltyRate / 100;

    // Display the results
    alert(`Total Payable Amount: ${totalPayableAmount.toFixed(2)}
Monthly Payable Amount: ${monthlyPayment.toFixed(2)}
Penalty Amount: ${penaltyAmount.toFixed(2)}`);
  });
</script>

<!-- 
		<script>
	$('.select2').select2({
		placeholder:"Please select here",
		width:"100%"
	})
	$('#calculate').click(function(){
		calculate()
	})
	

	function calculate(){
		start_load()
		if($('#loan_plan_id').val() == '' && $('[name="amount"]').val() == ''){
			alert_toast("Select plan and enter amount first.","warning");
			return false;
		}
		var plan = $("#plan_id option[value='"+$("#plan_id").val()+"']")
		$.ajax({
			url:"user_calculation.php",
			method:"POST",
			data:{amount:$('[name="amount"]').val(),months:plan.attr('data-months'),interest:plan.attr('data-interest_percentage'),penalty:plan.attr('data-penalty_rate')},
			success:function(resp){
				if(resp){
					
					$('#user_calculation').html(resp)
					end_load()
				}
			}

		})
	}
	$('#loan-application').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_loan',
			method:"POST",
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1 ){
					$('.modal').modal('hide')
					alert_toast("Loan Data successfully saved.","success")
					setTimeout(function(){
						location.reload();
					},1500)
				}
			}
		})
	})
	$(document).ready(function(){
		if('<?php echo isset($_GET['id']) ?>' == 1)
			calculate()
	})
</script>
		
<tbody>
						<?php
							
							$i=1;
							$type = $conn->query("SELECT * FROM loan_types where id in (SELECT loan_type_id from loan_list) ");
							while($row=$type->fetch_assoc()){
								$type_arr[$row['id']] = $row['type_name'];
							}
							$plan = $conn->query("SELECT *,concat(months,' month/s [ ',interest_percentage,'%, ',penalty_rate,' ]') as plan FROM loan_plan where id in (SELECT plan_id from loan_list) ");
							while($row=$plan->fetch_assoc()){
								$plan_arr[$row['id']] = $row;
							}
							$qry = $conn->query("SELECT l.*,concat(b.lastname,' ',b.firstname,' ',b.middlename)as name, b.contact_no, b.address from loan_list l inner join borrowers b on b.id = l.borrower_id  order by id asc");
							while($row = $qry->fetch_assoc()):
								$monthly = ($row['amount'] + ($row['amount'] * ($plan_arr[$row['plan_id']]['interest_percentage']/100))) / $plan_arr[$row['plan_id']]['months'];
								$penalty = $monthly * ($plan_arr[$row['plan_id']]['penalty_rate']/100);
								$payments = $conn->query("SELECT * from payments where loan_id =".$row['id']);
								$paid = $payments->num_rows;
								$offset = $paid > 0 ? " offset $paid ": "";
								if($row['status'] == 2):
									$next = $conn->query("SELECT * FROM loan_schedules where loan_id = '".$row['id']."'  order by date(date_due) asc limit 1 $offset ")->fetch_assoc()['date_due'];
								endif;
								$sum_paid = 0;
								while($p = $payments->fetch_assoc()){
									$sum_paid += ($p['amount'] - $p['penalty_amount']);
								}

						 ?>
						

						<?php endwhile; ?> 
					</tbody> -->
				</table>

	</form>
</body>
</html>
