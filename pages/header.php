<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Biblioteca online</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">


	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/javascript.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
	
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">

		    <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="/index.php">Biblioteca</a>
            </div>
			
			<div id="navbar" class="navbar-collapse collapse">
			<?php 
			if ($_SERVER["REQUEST_URI"]!="/cititori.php") {?>
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="/cititori.php">Cititori</a>
					</li>
				</ul>
			<?php }else { ?>
			} ?>
				<ul class="nav navbar-nav">
					<li>
						<a href="index.php">Home</a>
					</li>
					<li class="active">
						<a href="/cititori.php">Cititori</a>
					</li>
				</ul>
				<?php } ?>
			<?php 	
			if(isset($_SESSION['autentificat'])) {?>
			<form action="/pages/logout.php" class="navbar-form pull-right">
				<button type="submit" class="btn btn-primary">Logout</button>
			</form>
			<?php 	} ?>
			</div>		
			
		</div>
	</div>

