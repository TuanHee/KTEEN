<?php 
include("../config/config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>KTEEN</title>
</head>
<body class="bg-light">
	<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-12 bg-white border-bottom">
		<span class="navbar-brand h1 mb-0 col">KTEEN</span>
		<ul class="navbar-nav px-4">
			
		</ul>
	</nav>

	<main class="container">
		<div class="row py-4 px-2">
			<div class="col bg-white shadow pl-0 pr-0">
				<div class="input-group">
					<input type="search" id="search-bar" placeholder="Search" class="form-control rounded-0 py-4 border-0">
					<div class="input-group-append">
						<button class="btn btn-block btn-dark rounded-0 px-3" id="search-btn">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div id="menu"></div>
	</main>
	<script type="text/javascript">
		function search() {
			var keyword = $("#search-bar").val();
			$.post("stall_card.php", {
				search_stall_name: keyword
			}, function(data, status) {
				$("#menu").html(data);
			});
		}
		$(document).ready(function() {
			if($("#search-bar").val() == ""){
				$.ajax({url: "stall_card.php", success: function(result) {
						$("#menu").html(result);
					}
				});
			}else{
				search();
			}
			
		});
		$("#search-btn").click(function() {
			search();
		});
		$("#search-bar").keyup(function() {
			search();
		});
		$("#menu").on('click', '.stall', function() {
			location.assign("menu.php?"+ $(this).attr("data-stall"));
			console.log("function called");
		});
	</script>
</body>
</html>