<?php
session_start();
include '../config/config.php';

if (isset($_POST['stall_username'])) {
	$page =@ $_GET['page'];
	if ($page == 0 || $page == 1) {
		
	}
	$search = '';
	if(isset($_POST['food_name'])){
		$search = " AND food.name LIKE '%". $_POST['food_name'] ."%'";
	}
	$sql = "SELECT 
	stall.username AS username, 
	food.name AS food_name, 
	food.image AS image, 
	food.price AS price
	FROM food LEFT JOIN stall ON food.stall_ID = stall.ID WHERE username = '". $_POST['stall_username'] ."' AND food.available = '1'". $search ." LIMIT 0, 8;";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$image = $row['image'];
?>
<div class="col-md-3 p-2">
	<div class="k-card card k-hover-shadow h-100" style="cursor: pointer;">
		<div style="position: relative;overflow: hidden;"> 
			<img src="../images/<?= $row['username']; ?>/menu/<?= $image; ?>" class="items" height="100" alt="" style="width: 100%;height: 200px;align-self: center;vertical-align: center;" />
		</div>
		<div class="card-body" style="position: relative;">
			<?= $row['food_name'] ?>
			<span class="text-white bg-dark py-1 px-2" style="position: absolute;right: -4px;">
				RM <span><?= $row['price']; ?></span>
			</span>
		</div>
	</div>
</div>
<?php
		}
	}else{
		if (isset($_POST['food_name'])) {
		?>
		<div class="col h5 text-center">
			Not have the result for '<?= $_POST['food_name']; ?>'
		</div>
		<?php
		}else{
		?>
		<div class="col h5 text-center">
			Not have any food
		</div>
		<?php
		}
?>

<?php
	}
}else{
?>
<div class="col text-center h5">
	Not has the result for '<?= $_POST['search_stall_name']; ?>'
</div>
<?php
}
$sql = "SELECT 
stall.username AS username, 
food.name AS food_name, 
food.image AS image, 
food.price AS price
FROM food LEFT JOIN stall ON food.stall_ID = stall.ID WHERE username = '". $_POST['stall_username'] ."' AND food.available = '1'". $search .";";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$a = ceil($count / 8);
?>
<div class="col-12 mt-2">
	<ul class="pagination pagination-md">
		<?php for ($i=0; $i < $a; $i++) { ?>
		<li class="page-item">
			<span class="page-link rounded-0 border-0 <?= $r = ($page == ($i))? 'bg-dark text-white': 'text-dark' ?>" style="cursor: pointer;">
				<?= ($i + 1) ?>
			</span>
		</li>
		<?php } ?>
		
	</ul>
</div>
