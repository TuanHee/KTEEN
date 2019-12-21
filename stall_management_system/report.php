<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_stall.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Bootstarp CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
	<title></title>
</head>
<body>
	<?php
	$site = 'Report';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10 p-4">
				<!-- income -->
				<div class="k-card card col-12">
					<div class="card-body">
						<div class="row">
							<div class="col-md-3"></div>
								<div class="col-md-6">
									<h4 class="card-title text-center">Income</h4>
								</div>			
						</div>
						<div class="row">
							<div class="table-responsive">
								<table class="table table-hover table-borderless table-striped table-sm">
									<thead class="thead-dark">
										<tr>
											<th>Type of Income</th>
											<th>Total (RM)</th>
											<th>Total (RM)</th>
										</tr>
									<?php
										$total_income; 
										$sql = "SELECT total FROM payment";
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$total_income = $row['total'];
											}
										}
									?>
										<tr>
											<td>Food</td>
											<td><?php echo $total_income ?></td>
											<input type="hidden" id="total_income" value="<?php echo $total_income ?>"></input>
										</tr>
									
										<tr>
											<td colspan="2" class="border-top"><strong>Total:</strong></td>
											<td class="border-top"><strong><?php echo $total_income ?></strong></td>
											
										</tr>
									
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- Expenses -->
				<div class="k-card card col-12">
					<div class="card-body">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<h4 class="card-title text-center">Expenses</h4>
							</div>
						</div>

						<div class="row">
							<div class="table-responsive">
								<table class="table table-hover table-borderless table-striped table-sm">
									<thead class="thead-dark">
										<tr>
											<th>Type of Expenses</th>
											<th>Total (RM)</th>
											<th>Total (RM)</th>
										</tr>
									<?php 
										$invoice_total=0;
										$sql = "SELECT invoice_amount FROM invoice";
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												// $_SESSION["invoice_total"] = $row['total'];	
												$invoice_total += $row['invoice_amount'];
											}
										}
									?>	
										<tr>
											<td>Invoice </td>
											<td><?php echo $invoice_total?> </td>
											<input type="hidden" id="invoice_session" value="<?php echo $invoice_total ?>"/>
										</tr>
										
									<?php
										$bill_total=0;
										$sql = "SELECT bill_amount FROM bill";
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$bill_total += $row['bill_amount'];
											}
										}
									?>
										<tr>
											<td>Bill</td>
											<td><?php echo $bill_total?></td>
											<input type="hidden" id="bill_session" value="<?php echo $bill_total ?>"/>
										</tr>

									<?php
										$receipt_total=0;	
										$sql = "SELECT receipt_amount FROM receipt";
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$receipt_total += $row['receipt_amount'];
											}
										}
									?>
										<tr>
											<td>Receipt</td>
											<td><?php echo $receipt_total?></td>
											<input type="hidden" id="receipt_session" value="<?php echo $receipt_total ?>"/>
										</tr>
									

									<?php
										$mail_total=0;
										$sql = "SELECT total FROM purchase";
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$mail_total = $row['total'];
											} 
										}
									?>
										<tr>
											<td>Sent from Mail</td>
											<td><?php echo $mail_total?></td>
											<input type="hidden" id="mail_session" value="<?php echo $mail_total ?>"/>
										</tr>


									<?php
										$total =$_SESSION["invoice_total"] + $_SESSION["bill_total"] + $_SESSION["receipt_total"] + $_SESSION["mail_total"];
									?>
										<tr>
											<td colspan="2" class="border-top"><strong>Total:</strong></td>
											<td class="border-top"><strong><?php echo $total ?></strong></td>
											<input type="hidden" id="total_expenses" value="<?php echo $total?>" />
										</tr>

									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- final calculatations -->
				<div class="k-card card col-12">
					<div class="card-body">
						<div class="row">
							<div class="col-md-3"></div>
								<div class="col-md-6">
									<h4 class="card-title text-center">Income - Expenses</h4>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="table-responsive">
								<table class="table table-hover table-borderless table-striped table-sm">
									<thead class="thead-dark">
										<tr>
											<th>Income / Expenses</th>
											<th>Total (RM)</th>
											<th>Total (RM)</th>
										</tr>

										<tr>
											<td>Income</td>
											<td><?php echo $_SESSION["total_income"] ?></td>
										</tr>

										<tr>
											<td>Expenses</td>
											<td><?php echo $total ?></td>
										</tr>
										<?php
											$finalCal = $_SESSION["total_income"] - $total;
										?>
										<tr>
											<td colspan="2" class="border-top"><strong>Total:</strong></td>
											<td class="border-top"><strong><?php echo $finalCal ?></strong></td>
										</tr>
									</thead>
								</table>	
						</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<canvas id="ExpenseChart"></canvas>
						<canvas id="finalChart"></canvas>
					</div>
				</div>
				
				
				
			</main>
		</div>
	</div>

</body>

<script type="text/javascript">
var invoice_total = document.getElementById("invoice_session").value;
var bill_total = document.getElementById("bill_session").value;
var receipt_total = document.getElementById("receipt_session").value;
var mail_total = document.getElementById("mail_session").value;

var income_total = document.getElementById("total_income").value;
var expenses_total = document.getElementById("total_expenses").value;
//console.log(expenses_total);

var ctx = document.getElementById('ExpenseChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ['Invoice', 'Bill', 'Receipt', 'Mail'],
        datasets: [{
            label: 'Expenses',
            backgroundColor:[
						'rgba(3, 49, 255)',
						'rgba(247, 20, 50)',
						'rgba(83, 237, 104)',
						'rgba(75, 192, 192, 0.6)'
					],
            borderColor: 'rgb(255, 255, 255)',
            data: [invoice_total, bill_total, receipt_total, mail_total]
        }]
    },

    // Configuration options go here
    options: {
		title:{
			display: true,
			text: 'Expenses'
		},
		layout:{
			padding:{
					left:0,
					right:0,
					bottom:50,
					top:0
				},
			},

	}
});


var ctx = document.getElementById('finalChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Income', 'Expenses'],
        datasets: [{
            label: 'Expenses',
            backgroundColor:[
						'rgba(3, 49, 255)',
						'rgba(83, 237, 104)',
						'rgba(75, 192, 192, 0.6)'
					],
            borderColor: 'rgb(255, 255, 255)',
            data: [income_total, expenses_total]
        }]
    },

    // Configuration options go here
    options: {
		title:{
			display: true,
			text: 'Income & Expenses Comparison'
		},
		layout:{
			padding:{
					left:0,
					right:0,
					bottom:300,
					top:0
				},
			},

	}
});
</script>
</html>

