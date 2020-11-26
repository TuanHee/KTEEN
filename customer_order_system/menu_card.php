<?php
session_start();
include '../config/config.php';
include '../config/test_input.php';
date_default_timezone_set("Asia/Kuala_Lumpur");
$current_time = time();

if (isset($_POST['stall_username'])) {
	// get stall id
	$sql = "SELECT ID FROM stall WHERE username = '". $_POST['stall_username'] ."';";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1) {
		$stall_ID = mysqli_fetch_assoc($result)['ID'];
	}
	
	$page =@ $_POST['page'];
	if ($page == 0 || $page == 1) {
		$page = 0;
	}else{
		$page = ($page * 8) - 8;
	}
	$search = '';
	if(isset($_POST['food_name'])){
		$food_name = test_input($_POST['food_name']);
		$search = " AND food.name LIKE '%$food_name%'";
	}
	$sql = "SELECT 
	stall.username AS username, 
	food.ID AS food_id,
	food.name AS food_name, 
	food.image AS image, 
	food.price AS price
	FROM food LEFT JOIN stall ON food.stall_ID = stall.ID WHERE username = '". $_POST['stall_username'] ."' AND food.available = '1'". $search ." LIMIT ". $page .", 8;";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$image = $row['image'];		
?>
<div class="col-md-3 p-2">
	<div class="k-card card k-hover-shadow h-100 <?=  'stall_menu' ?>" style="cursor: pointer;" data-food_id="<?= $row['food_id']; ?>">
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
			Not have the result for '<?= $food_name; ?>'
		</div>
		<?php
		}else{
		?>
		<div class="col h5 text-center">
			No Food Available Yet
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