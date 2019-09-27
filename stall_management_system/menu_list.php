<?php 
session_start();

$keyword = "";
if (isset($_GET['k'])) {
    $keyword = " AND food.name LIKE '%".$_GET['k']."%'";
}

$search_category = "";
if(isset($_GET['c'])){
	$search_category = " AND category_ID = '".$_GET['c']."'";
}

?>
<div class="k-card card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover table-borderless table-striped table-sm">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Name</th>
						<th>Catergory</th>
						<th>Price</th>
						<th>Status</th>
						<th colspan="4" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					include '../config/config.php';
					$sql = "SELECT food.ID AS ID, food.name AS name, image, category.name AS category, price, available FROM food LEFT JOIN category ON food.category_ID = category.ID WHERE stall_ID = '".$_SESSION['kteen_stall_id']."'".$keyword.$search_category." LIMIT 10";
					$result = mysqli_query($conn, $sql)  or die (mysqli_error($conn));
					if(mysqli_num_rows($result)){
						while ($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<th><?= $row['ID']; ?></th>
						<td><img src="../images/<?= $_SESSION['stall_username']; ?>/menu/<?= $row['image']; ?>" style="width: 100px;height:75px;"></td>
						<td><?= $row['name']; ?></td>
						<td><?= $row['category']; ?></td>
						<td>RM <?= $row['price']; ?></td>
						<td><?= $r = ($row['available'] == 1) ? '<small class="text-success">action</small>' : '<small class="text-danger">hidden</small>' ; ?></td>
						<td>
							<a href="#modal_<?= $row['ID']; ?>" class="btn btn-sm btn-outline-dark" data-toggle="modal">View</a>
						</td>
						<td>
							<a href="edit_menu.php?id=<?= $row['ID']; ?>" class="btn btn-sm btn-outline-success">Edit</a>
						</td>
						<td>
							<?php 
							if ($row['available'] == 1) { ?>
								<button class="btn btn-sm btn-outline-warning">hidden</button>
							<?php
							}else{
							?>
								<button class="btn btn-sm btn-outline-primary">action</button>
							<?php 
							}
							?>
						</td>
						<td>
							<button class="btn btn-sm btn-outline-danger">Delete</button>
						</td>
					</tr>
					<?php
					include 'menu_modal.php';
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="pt-2">
	<ul class="pagination">
		<?php 
		$result = mysqli_query($conn, "SELECT * FROM food WHERE  stall_ID = '". $_SESSION['kteen_stall_id'] ."'");
		$count = mysqli_num_rows($result);
		$a = $count = $count / 9;
		$a = ceil($a);
		mysqli_close($conn);

		for ($i = 1; $i <= $a; $i++) { ?>
		<li class="page-item">
			<button class="page-link" onclick="live_search()"><?= $i ?></button>
		</li>
		<?php } ?>
  </ul>
</div>