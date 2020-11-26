<?php
include '../config/config.php';
date_default_timezone_set("Asia/Kuala_Lumpur");
$current_time = time();

if(isset($_POST['stall_username']) && !empty($_POST['stall_username'])){
	$sql = "SELECT ID, username, stall_name FROM stall WHERE username = '".  $_POST['stall_username'] ."';";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			$stall_ID = $row['ID'];
?>
<div class="col-md-4 mb-3 text-center">
	<img style="width: 350px;height: 200px;" src="../images/<?= $row['username']; ?>/stall.jpg">
</div>
<div class="col-md-8 bg-white shadow p-4 mb-3" style="position: relative;overflow: hidden;">
	<div class="h5"><?= $row['stall_name']; ?></div>
	<div class="border-top h6 pt-2">
	Notice**
	<br>
	<?php
	$notice_sql = "SELECT date, description FROM notice WHERE stall_ID = '". $_POST['stall_username'] ."' ORDER BY ID DESC;";
	$notice = mysqli_query($conn, $notice_sql);
	if(mysqli_num_rows($notice) > 0){
		while ($notice_row = mysqli_fetch_assoc($notice)) {
	?>
	<div class="row pb-3">
		<div class="col-md-2 text-muted">
			<?= $notice_row['date']; ?>
		</div>
		<div class="col-md-10">
			<?= $notice_row['description']; ?>
		</div>
	</div>
	<?php
		}
	}else{
	?>
	No notice so far
	<?php }	?>
	</div>
</div>
<?php
		}
	}
}else{
?>
<script type="text/javascript">
	window.location.assign("index.html");
</script>
<?php
}
?>