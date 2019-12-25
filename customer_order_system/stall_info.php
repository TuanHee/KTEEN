<?php
include '../config/config.php';
date_default_timezone_set("Asia/Kuala_Lumpur");
$current_time = time();

if(isset($_POST['stall_username']) && !empty($_POST['stall_username'])){
	$sql = "SELECT ID, username, stall_name, status FROM stall WHERE username = '".  $_POST['stall_username'] ."';";
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
	<div class="row">
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
<?php if ($row['status'] == 0){ ?>
	<span class="bg-danger" style="position: absolute;bottom: 10px;right: -16px;width: 120px;height: 32px;transform: skew(-45deg);"></span>
	<span style="position: absolute;bottom: 10px;right: 0;width: 120px;height: 32px;transform: skew(-45deg);background-color: rgba(255, 0, 0, 0.5);"></span>
	<span class="text-white" style="position: absolute;bottom: 15px;right: 20px;">Closing</span>
<?php }else if($row['status'] == 1) { ?>
	<span class="bg-success" style="position: absolute;bottom: 10px;right: -10px;width: 120px;height: 32px;transform: skew(-45deg);"></span>
	<span style="position: absolute;bottom: 10px;right: 0;width: 120px;height: 32px;transform: skew(-45deg);background-color: rgba(0, 255, 0, 0.5);"></span>
	<span class="text-white" style="position: absolute;bottom: 15px;right: 15px;">Opening</span>
<?php }else{
	$time_sql = "SELECT start_time, end_time FROM opening_time WHERE stall_ID = '$stall_ID' AND weekday = WEEKDAY(CURDATE());";
	$time_result = mysqli_query($conn, $time_sql);
	if(mysqli_num_rows($time_result) == 1){
		$time = mysqli_fetch_assoc($time_result);
		$start_time = strtotime($time['start_time']);
		$end_time = strtotime($time['end_time']);
	}
	if($start_time < $current_time && $end_time > $current_time){
?>
	<span class="bg-success" style="position: absolute;bottom: 10px;right: -10px;width: 120px;height: 32px;transform: skew(-45deg);"></span>
	<span style="position: absolute;bottom: 10px;right: 0;width: 120px;height: 32px;transform: skew(-45deg);background-color: rgba(0, 255, 0, 0.5);"></span>
	<span class="text-white" style="position: absolute;bottom: 15px;right: 15px;">Opening</span>
<?php }else{ ?>
	<span class="bg-danger" style="position: absolute;bottom: 10px;right: -16px;width: 120px;height: 32px;transform: skew(-45deg);"></span>
	<span style="position: absolute;bottom: 10px;right: 0;width: 120px;height: 32px;transform: skew(-45deg);background-color: rgba(255, 0, 0, 0.5);"></span>
	<span class="text-white" style="position: absolute;bottom: 15px;right: 20px;">Closing</span>
<?php
	}
} ?>
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