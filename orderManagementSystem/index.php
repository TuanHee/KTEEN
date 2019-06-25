<?php
include("../config.php");
session_start();
//logout
if(isset($_GET['u'])){
	if ($_GET['u'] == 'logout') {
		session_destroy();
		echo "<script>window.location.assign('login.html');</script>";
	}
}

if($_SESSION['staffid']!= ''){
	$staffid = $_SESSION['staffid'];
}else{
	echo "<script>window.location.assign('login.html');</script>";
}

if(isset($_POST['in'])){
	$staffid = $_POST['staffid'];
	
	$sql = "INSERT into attendancein (staffid, date , time) values ('$staffid', CURDATE(), CURTIME())";
	echo "<script>alert('Punch Card Successfull');</script>";
	$result = $conn->query($sql);

}

if(isset($_POST['on'])){
	$staffid = $_POST['staffid'];
	
	$sql = "INSERT into attendancein (staffid, date , time) values ('$staffid', CURDATE(), CURTIME())";
	echo "<script>alert('Punch Card Successfull');</script>";
	$result = $conn->query($sql);
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/kteen_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
</head>
<body class="bg-light">
	<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
		<span class="navbar-brand h1 mb-0 col"><i class="fas fa-bars d-inline-flex mr-2"></i>Stalls</span>
		<ul class="navbar-nav px-4">
			<li class="nav-item">
				<a href="index.php?logout='1'" class="btn btn-outline-dark" role="button" aria-pressed="true">Log Out</a>
			</li>
		</ul>
	</nav>
	<nav class="k-side-nav nav flex-column col-2 border-right bg-white p-0">
        <div class="logo">
            <h2>
                <a href="index.php" class="d-flex d-md-none">K</a>
                <a href="index.php" class="d-none d-md-flex">KTEEN</a>
            </h2>
        </div>
        <div class="k-nav-container h-75">
            <ul class="k-nav nav">
                <li class="nav-item w-100 mb-1">
                    <a href="staffmain.php" class="nav-link w-100 active">
                        <i class="fas fa-bars d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Punch In</span>
                    </a>
                    <a href="makeorder.php" class="nav-link w-100">
                        <i class="fas fa-hamburger d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Make Order</span>
                    </a>
                </li>    
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10 p-4">
				<div class="row pb-3">
					<div class="col-12 col-sm-5 col-md-4 col-lg-3">
						<div class="btn-group shadow-sm m-2">
							<a href="#addstall" data-toggle="modal" class="btn bg-white">
								<i class="fas fa-plus"></i>
							</a>
							<a href="" class="btn bg-white"><i class="fas fa-list"></i></a>
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
							<div id="result"></div>
						</div>
					</div>
				</div>
				
				<!-- <div>
					<table class="table">
	            		<thead class="thead-light">
	            			<tr>
	            				<th scope="col"></th>
	            				<th scope="col">Options</th>
	            				<th scope="col">Date & Time</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<tr>
	            				<form method="post" action="staffmain.php">
		            				<td>Punch-In</td>
		            				<input type="hidden" name="staffid" value="<?php echo $staffid;?>">
		            				<td><input class="btn btn-primary bg-dark" type="submit" value="Submit" name="in" id="inbtn"></td>
		            				<td><span id="datetime"></span></td>
		            			</form>
	            			</tr>
	            			<tr>
	            				<td>Punch-Out</td>
	            				<input type="hidden" name="staffid" value="<?php echo $staffid; ?>">
	            				<td><input class="btn btn-primary bg-dark" type="submit" value="Submit" name="out"></td>
	            				<td><span id="datetime1"></span></td>
	            			</tr>
	            		</tbody>
	    			</table>
				</div> -->
			</main>
		</div>
	</div>

    

</body>
<script>
	function ComfirmDelete(){
		return confirm("Are you sure you want to delete?");
	}

	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

	var dt = new Date();
	document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));

	var dt = new Date();
	document.getElementById("datetime1").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));

function submitPoll(id){
      document.getElementById("inbtn").disabled = true;
      setTimeout(function(){document.getElementById("inbtn").disabled = false;},5000);
  }

</script>
</html>