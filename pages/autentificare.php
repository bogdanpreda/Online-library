<?php include "pages/header.php"; ?>
<?php 
if(isset($_POST['Submit']))
{
	echo "da";
}
?>
	<div class="container c1">

		<div class=" col-md-6 col-md-offset-3">
			<div class="well modificat">
			<form action="autentificare.php" method="POST" class="form-horizontal" role="form">
					<div class="form-group">
						<legend>Autentificare</legend>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="">Username: </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="username" id="" placeholder="insert the username...">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="">Password: </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="password" id="" placeholder="insert the password...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<button type="submit" name="Submit" class="btn btn-success">LogIn</button>
							<button type="reset" class="btn btn-primary">Reset</button>
						</div>
					</div>
			</form>
		</div>
		</div>
	</div>
	</body>
</html>