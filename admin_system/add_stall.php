<?php 
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_admin.php';
include '../process/handle_add_stall.php';
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

	<title></title>
</head>
<body>
	<?php 
	$site = 'Add Stall';
	include '../layout/top_nav_admin.php';
	include '../layout/side_nav_admin.php';
	?>
	<main class="container-fluid">
		<div class="row py-3">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="k-card card rounded-0">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
						<div class="row no-gutters">
							<div style="width: 100%;position: relative;height: 250px;">
								<img src="../images/stall_image.png" style="height: 250px;width: 100%;position: absolute;" id="#img-stall">
								<input type="file" name="stall_image" id="input-stall-image" accept="image/*" required style="position: absolute;width: 100%;height: 100%;opacity: 0;" data-target="#img-stall">
								<label for="input-stall-image" class="btn btn-light" style="position: absolute;right: 10px;bottom: 5px;"><i class="fas fa-camera"></i></label>
								<div style="position: absolute;top: 50%;left: 3%;">
									<div style="position: relative;width: 250px;height: 250px;">
										<img src="../images/personal.jpg" class="rounded-circle" style="width: 250px;height: 250px;position: absolute;" id="img-owner">
										<input type="file" name="owner_image" id="input-owner-image" data-target="#img-owner" accept="image/*" style="width: 250px;height: 250px;position: absolute;border-radius: 50%;opacity: 0;" required>
										<label for="input-owner-image" class="btn btn-dark" style="position: absolute;bottom: 10px;right: 20px;z-index: 2;"><i class="fas fa-camera"></i></label>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-4" style="height: 110px;"></div>
								<div class="col-lg-7">
									<div class="card-title h3">
										Personal Detail
									</div>
									<hr>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Name</label>
										<div class="col-md-9">
											<input type="text" name="owner_name" value="<?= $owner_name; ?>" class="form-control <?= $owner_name_valid ?>" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">NRIC</label>
										<div class="col-md-9">
											<input type="text" name="NRIC" value="<?= $NRIC; ?>" class="form-control <?= $NRIC_valid ?>" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Contact No</label>
										<div class="col-md-9">
											<input type="text" name="contact_no" value="<?= $contact_no; ?>" class="form-control <?= $contact_no_valid ?>" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Email</label>
										<div class="col-md-9">
											<input type="email" name="email" value="<?= $email; ?>" class="form-control <?= $email_valid ?>" required>
										</div>
									</div>
								</div>
								<div class="col-lg-1"></div>
							</div>
							<div class="card-title h3">
								Account
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Username</label>
										<div class="col-md-9">
											<input type="text" name="username" class="form-control <?= $username_valid ?>" value="<?= $username ?>" required>
											<div class="invalid-feedback">
												That username is taken.Try another.
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="password">Password</label>
										<div class="col-md-9">
											<input type="password" name="password" id="password" class="form-control <?= $password_valid; ?>" value="<?= $p ?>" required>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Stall Name</label>
										<div class="col-md-9">
											<input type="text" name="stall_name" class="form-control <?= $stall_name_valid ?>" value="<?= $stall_name; ?>" required>
											<div class="invalid-feedback">
												That stall is already exist.Try another.
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="confirm_password" style="font-size: 0.82rem;">Confirm Password</label>
										<div class="col-md-9">
											<input type="password" name="confirm_password" id="confirm_password" class="form-control <?= $password_valid; ?>" value="<?= $p; ?>" required>
											<div class="invalid-feedback">
												The password are not matched.Try again.
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="h3">
								Opening time
							</div>
							<hr>
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-7">
									<div class="form-group row">
										<label class="col-md-4 col-form-label col-form-label-sm text-md-right">Sunday</label>
										<div class="col-md-8">
											<div class="input-group input-group-sm">
												<input type="time" name="sunday_start" class="form-control" required>
												<div class="input-group-prepend input-group-append">
													<span class="input-group-text">-</span>
												</div>
												<input type="time" name="sunday_end" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-form-label col-form-label-sm text-md-right">Monday</label>
										<div class="col-md-8">
											<div class="input-group input-group-sm">
												<input type="time" name="monday_start" class="form-control" required>
												<div class="input-group-prepend input-group-append">
													<span class="input-group-text">-</span>
												</div>
												<input type="time" name="monday_end" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-form-label col-form-label-sm text-md-right">Tuesday</label>
										<div class="col-md-8">
											<div class="input-group input-group-sm">
												<input type="time" name="tuesday_start" class="form-control" required>
												<div class="input-group-prepend input-group-append">
													<span class="input-group-text">-</span>
												</div>
												<input type="time" name="tuesday_end" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-form-label col-form-label-sm text-md-right">Wednesday</label>
										<div class="col-md-8">
											<div class="input-group input-group-sm">
												<input type="time" name="wednesday_start" class="form-control" required>
												<div class="input-group-prepend input-group-append">
													<span class="input-group-text">-</span>
												</div>
												<input type="time" name="wednesday_end" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-form-label col-form-label-sm text-md-right">Thursday</label>
										<div class="col-md-8">
											<div class="input-group input-group-sm">
												<input type="time" name="thursday_start" class="form-control" required>
												<div class="input-group-prepend input-group-append">
													<span class="input-group-text">-</span>
												</div>
												<input type="time" name="thursday_end" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-form-label col-form-label-sm text-md-right">Friday</label>
										<div class="col-md-8">
											<div class="input-group input-group-sm">
												<input type="time" name="friday_start" class="form-control" required>
												<div class="input-group-prepend input-group-append">
													<span class="input-group-text">-</span>
												</div>
												<input type="time" name="friday_end" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-form-label col-form-label-sm text-md-right">Saturday</label>
										<div class="col-md-8">
											<div class="input-group input-group-sm">
												<input type="time" name="saturday_start" class="form-control" required>
												<div class="input-group-prepend input-group-append">
													<span class="input-group-text">-</span>
												</div>
												<input type="time" name="saturday_end" class="form-control" required>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-3"></div>
							</div>
							<div class="row">
								<div class="col text-right">
									<button class="btn text-danger">Cancel</button>
									<input type="submit" name="add_stall" class="btn" value="Submit">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	<script src="../js/show_input_image.js"></script>
	<script type="text/javascript">
		// $("input[type='time']").change(function() {
		// 	var input_name = $(this).attr("name");
		// 	var time = $(this).val();
		// 	var arr = input_name.split("_");
		// 	if (arr[1] == "start") {
		// 		$("input[name='"+ arr[0] +"_end']").attr("min", time);
		// 	}else if(arr[1] == "end"){

		// 	}
		// 	console.log(time);
		// });
		$("#input-stall-image").change(function() {
			readURL(this);
		});
		$("#input-owner-image").change(function() {
			readURL(this);
		});
	</script>
</body>
</html>