<div class="modal fade" id="modal<?= $row['ID']; ?>" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4 text-center">
						<img class="rounded-circle p-2" src="../images/<?= $_SESSION['stall_username']; ?>/staff/<?= $row['image']; ?>" style="height: 240px;width: 240px;">
					</div>
					<div class="col-md-8 pt-4">
						<div class="row pb-2">
							<div class="col">
								<div class="row">
									<small class="text-muted col">Name</small>
									<div class="w-100"></div>
									<div class="col">
										<?php echo $row['name']; ?>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="row">
									<small class="text-muted col">Position</small>
									<div class="w-100"></div>
									<div class="col">
										<?php echo $row['position']; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row pb-2">
							<div class="col">
								<div class="row">
									<small class="text-muted col">Contact No</small>
									<div class="w-100"></div>
									<div class="col">
										<?php echo $row['contact_no']; ?>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="row">
									<small class="text-muted col">Address</small>
									<div class="w-100"></div>
									<div class="col">
										<?php echo $row['address']; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row pb-2">
							<div class="col">
								<div class="row">
									<small class="text-muted col">Experience</small>
									<div class="w-100"></div>
									<div class="col">
										<?= ($row['experience'] == '')? 'Not yet' : $row['experience']; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col text-right">
						<button class="btn text-secondary" data-dismiss="modal">Close</button>
						<button class="btn text-danger" onclick="ask_delete_employee('<?= $row['ID'] ?>')">Delete</button>
						<a href="edit_employee.php?employee_id=<?= $row['ID'] ?>" class="btn text-warning">Edit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>