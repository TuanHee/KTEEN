<?php 

include '../config/config.php';

include '../process/handle_edit_supplier.php';

if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
    $sql = "SELECT * FROM supplier WHERE ID = '$ID';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
			$ID = $row['ID'];
            $Name = $row['Name'];
            $company_name = $row['company_name'];
            $contact_no = $row['contact_no'];
			$email = $row['email'];
			$address = $row['address'];
			$stall_ID = $row['stall_ID'];
        }
    }
}



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

	<script src="../js/show_input_image.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
<?php 
	$site = 'Purchase';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>

<div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10 p-4">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="k-card card col-12">
							<div class="card-body">
								<div class="row">
									<div class="col-md-1"></div>
										<div class="col-md-12">
											<h4 class="card-title text-center">Edit Supplier Info</h4>	
										</div>
								</div>	
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
												<label class="col-md-3 col-form-label">Name</label>
												<div class="col-md-9">
													<input type="text" name="Name" class="form-control" value="<?php echo $Name?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Company Name</label>
												<div class="col-md-9">
													<input type="text" name="company_name" class="form-control" value="<?= $company_name ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Contact No</label>
												<div class="col-md-9">
													<input type="text" name="contact_no" class="form-control" value="<?= $contact_no ?>" required>
													
												</div>
											</div>
											
										
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">E-mail</label>
											<div class="col-md-9">
												<input id="email" type="email" name="email" class="form-control" value="<?= $email ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Address</label>
											<div class="col-md-9">
												<textarea class="form-control" name="address" ><?= $address ?></textarea>
											</div>
										</div>
										<input type="hidden" name="stall_ID" value="<?php echo $_SESSION['kteen_stall_id']?>"/>
										<input type="hidden" name="ID" value="<?= $ID ?>"/>
									</div>
									
								</div>
							</div>
							<div class="card-footer bg-white text-right">
								<a href="purchase.php" class="btn text-danger">Cancel</a>
								<input type="submit" name="edit_supplier" value="Submit" class="btn text-dark">
							</div>
						</div>
					</div>
				</form>
			</main>
		</div>
	</div>
</body>
</html>
