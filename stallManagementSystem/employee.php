<?php 
session_start();
include '../server/config.php';
include '../server/logout.php';
include 'activity/handle_login.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../css/kteen_style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
	<?php 
	$site = 'Employee';
	include 'layout/topnav.php';
	include 'layout/sidenav.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10 p-4">
				<div class="row pb-3">
					<div class="col-12 col-sm-5 col-md-4 col-lg-3">
						<div class="btn-group shadow-sm m-2">
							<a href="add_employee.php" class="btn bg-white">
								<i class="fas fa-plus"></i>
							</a>
							<a href="" class="btn bg-white"><i class="fas fa-list"></i></a>
							<select name="position" class="btn bg-white" onchange="filter_employee()" id="fp">
                                <option value="">All</option>
                                <option value="head chef">Head Chef</option>
                                <option value="kitchen porter">Kitchen Porter</option>
                                <option value="dishwasher">Dishwasher</option>
                                <option value="counter">Counter</option>
                            </select>
						</div>
					</div>
					<div class="col-12 col-sm-7 col-md-8 col-lg-9">
						<div class="input-group shadow-sm m-2">
							<div class="input-group-prepend">
								<div class="input-group-text border-0 bg-white">
									<i class="fas fa-search"></i>
								</div>
						    </div>
							<input type="search" id="search" name="search" placeholder="Search" class="form-control border-0" oninput="filter()">
						</div>
					</div>
				</div>
				<div>
					<?php include 'employee_card.php'; ?>
				</div>
			</main>
		</div>
	</div>
</body>
</html>
