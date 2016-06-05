<?php 	

if(isset($_SESSION['autentificat'])) {
	echo "da";
} else {
?>
<h1>Trebuie sa fi logat pentru a accesa aceasta pagina</h1>
<p>Click <a href="/index.php">aici</a> pentru a te loga</p>
<?php
}
?>

