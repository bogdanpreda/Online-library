<?php include "pages/header.php";

if(!isset($_SESSION['autentificat'])) {

//	$db->inserare_carte(12345 ,"nume_carte", "autor",  strtotime("2016-01-07"), 234, 5, 22, "categorie", "raft");
?>
	<div class="row">
	<div class="container c1">
		
		<div class=" col-md-6 col-md-offset-3">
			<div class="well modificat">
			<form action="index.php" method="POST" class="form-horizontal" role="form">
					<div class="form-group">
						<legend>Autentificare</legend>
					</div>
					
					<?php 
			
					if(isset($_POST['Submit']))
					{
						echo '<div class="error">';
						$username = $_POST['username'];
						$password = $_POST['password'];
						if($username == "" || $password == "")
							echo "Completati campurile";
						else if($username == "admin" && $password == "qwerty123") 
						{
							$_SESSION['autentificat']=1;
							header('Location: index.php');
						}

						else 
							echo "Numele sau parola sunt incorecte";
					echo '</div>';
					} 
					?>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="">Username: </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="username" id="" placeholder="insert the username...">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="">Password: </label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" id="" placeholder="insert the password...">
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
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>
<?php  
} else {
include "pages/cititori.php";
	if(isset($_POST['adauga'])) {
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];
		$cnp = $_POST['cnp'];
		$adresa = $_POST['adresa'];
		$numar_telefon = $_POST['numar_telefon'];
		$email = $_POST['email'];
		$informatie_carte = "";

		if($nume == "" || $prenume == "" || $cnp == "" || $adresa == "" ||
			$numar_telefon == "" || $email == "")
			echo "<script>alert('Va rugam completati toate campurile.');</script>";
		else 
		{
			if($db->inserare_cititor($nume, $prenume, $cnp, $adresa, $numar_telefon, $email, $informatie_carte)) {
				echo "<script>alert('Cititorul a fost adaugat cu succes');</script>";
				echo "<script>window.location.href = 'http://localhost/cititori.php';</script>";
			}
			else
				echo "<script>alert('Ceva nu a mers bine');</script>";
		}
	}
	if(isset($_POST['imprumut_carte'])) {
		$cnp = $_POST['cnp'];
		$ISBN = $_POST['ISBN'];
		$nume_carte = $_POST['nume_carte'];
		if($cnp=="" || $ISBN==""||$nume_carte=="")
			echo "<script>alert('Va rugam completati toate campurile.');</script>";
		else {
		if($_POST['act']=='imprumut_carte')
			echo "<script>alert('Cartea a fost imprumutata');</script>";
		else
			echo "<script>alert('Cartea a fost returnata');</script>";
		echo "<script>window.location.href = 'http://localhost/cititori.php';</script>";
		}
	}

	if($_GET['act'] && $_GET['id']) {
		$db->sterge_carte($_GET['id']);
		echo "<script>alert('Cititorul a fost stearsa cu succes');</script>";
		echo "<script>window.location.href = 'http://localhost/cititori.php';</script>";
	}
}
?>