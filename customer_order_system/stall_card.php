<?php
include '../config/config.php';
include '../config/test_input.php';
date_default_timezone_set("Asia/Kuala_Lumpur");
$current_time = time();

$search = "";// search stall name by keyword
if (isset($_POST['search_stall_name'])) {
	$search_stall_name = test_input($_POST['search_stall_name']);
	$search = "WHERE stall_name LIKE '%$search_stall_name%' ";
}
?>
<div class="row">
	<?php
	$page = @ $_POST['page'];
	if($page == 0 || $page == 1){
		$page = 0;
	}else{
		$page = ($page * 8) - 8;
	}
	$sql = "SELECT ID, username, stall_name FROM stall ". $search ." LIMIT ". $page .", 8;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$stall_ID = $row['ID'];
			$stall_username = $row['username'];
			$stallname = $row['stall_name'];
			
	?>
	<div class="col-sm-6 col-md-4 col-lg-3 p-2">
		<div class="k-card card k-hover-shadow h-100 stall" style="cursor: pointer;" data-stall="<?= $stall_username; ?>">
			<div style="position: relative;overflow: hidden;"> 
				<img src="../images/<?= $stall_username; ?>/stall.jpg" class="items" height="100" alt="" style="width: 100%;height: 200px;align-self: center;vertical-align: center;" />
			</div>
			<div class="card-body">
				<div class="card-text">
					<span class="name h5"><?= $stallname ?></span>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	}else{
	?>
	<div class="col text-center h5">
		No result for '<?= $search_stall_name; ?>'
	</div>
	<?php
	}
	$count = mysqli_num_rows($result);
	mysqli_close($conn);
	$a = ceil($count / 8);
	?>
	<div class="col-12 mt-2">
		<ul class="pagination pagination-md">
			<?php for ($i=1; $i <= $a; $i++) { ?>
			<li class="page-item">
				<span class="page-link rounded-0 border-0 <?= $r = ($page == ($i * 8) - 8)? 'bg-dark text-white': 'text-dark' ?>" style="cursor: pointer;" data-page="<?= $i ?>"><?= $i ?></span>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>