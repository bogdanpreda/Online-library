<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
 ?>
<h1>Trebuie sa fi logat pentru a accesa aceasta pagina</h1>
<p>Click <a href="/index.php">aici</a> pentru a te loga</p>
<?php

} else {
include "db.php";
$db = new Database();
$cititori = $db->get_cititori();
?>

<div class="container c1">
	<button id="add_cititor" class="btn btn-primary">Adauga cititor</button>
	<button id="imprumut_carte" class="btn btn-primary">Imprumut carte</button>
	<button id="returnare_carte" class="btn btn-primary">Returnare carte</button>
		<div class="returnare_carte">
	<br>
		<form action="cititori.php?act=returnare_carte" method="POST" class="form-inine" role="form">
				<div class="form-group">
					<legend>Returneaza Carte</legend>
				</div>

				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">CNP: </label>
						<input type="text" class="form-control" name="cnp">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">ISBN: </label>
						<input type="text" class="form-control" name="ISBN">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Nume carte: </label>
						<input type="text" class="form-control" name="nume_carte">
					</div>
				</div>
		
				<div class="form-group">
					<div class="col-sm-8">
						<button type="submit" name="imprumut_carte" onclick="return confirm('Esti sigur ca vrei sa returnezi cartea?');" class="btn btn-spatiu btn-success">Submit</button>
					</div>
				</div>
		</form>
	</div>
	<div class="imprumut_carte">
	<br>
		<form action="cititori.php?act=imprumut_carte" method="POST" class="form-inine" role="form">
				<div class="form-group">
					<legend>Imprumuta Carte</legend>
				</div>

				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">CNP: </label>
						<input type="text" class="form-control" name="cnp">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">ISBN: </label>
						<input type="text" class="form-control" name="ISBN">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Nume carte: </label>
						<input type="text" class="form-control" name="nume_carte">
					</div>
				</div>
		
				<div class="form-group">
					<div class="col-sm-8">
						<button type="submit" name="imprumut_carte" onclick="return confirm('Esti sigur ca vrei sa adaugi cartea?');" class="btn btn-spatiu btn-success">Submit</button>
					</div>
				</div>
		</form>
	</div>
	<div class="adaugare_cititor">
	<br>
		<form action="cititori.php?act=adauga_cititor" method="POST" class="form-inine" role="form">
				<div class="form-group">
					<legend>Adauga cititor</legend>
				</div>
		
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Nume: </label>
						<input type="text" class="form-control" name="nume">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Prenume: </label>
						<input type="text" class="form-control" name="prenume">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">CNP: </label>
						<input type="text" class="form-control" name="cnp">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Adresa: </label>
						<input type="text" class="form-control" name="adresa">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Numar de telefon: </label>
						<input type="text" class="form-control" name="numar_telefon">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Email: </label>
						<input type="text" class="form-control" name="email">
					</div>
				</div>
		
				<div class="form-group">
					<div class="col-sm-8">
						<button type="submit" name="adauga" onclick="return confirm('Esti sigur ca vrei sa adaugi cartea?');" class="btn btn-spatiu btn-success">Submit</button>
					</div>
				</div>
		</form>
	</div>
	<br><br>
	<table id="example" class="table table table-striped table-bordred">
		<thead>
			<tr>
				<th>Nume</th>
				<th>Prenume</th>
				<th>CNP</th>
				<th>Adresa</th>
				<th>Numar telefon</th>
				<th>Email</th>	
				<th>Informatie carte</th>
				<th>Optiuni</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($cititori as $cititor) {
				echo "<tr>";
				echo "<td>".$cititor['nume']."</td>";
				echo "<td>".$cititor['prenume']."</td>";
				echo "<td>".$cititor['cnp']."</td>";
				echo "<td>".$cititor['adresa']."</td>";
				echo "<td>".$cititor['numar_telefon']."</td>";
				echo "<td>".$cititor['email']."</td>";
				echo "<td>".$cititor['informatie_carte']."</td>";
				echo "<td>
					<button class='modifica_cititor btn btn-sm btn-primary' id1='{$cititor['ID']}'  data-toggle='modal' data-target='#edit_cititor'><i class='glyphicon glyphicon-edit'></i></button>
					<a class='confirma_stergere' href='index.php?act=delete&id={$cititor['ID']}'><button id='{$cititor['ID']}' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-trash'></i></button></a>
				</td>";
				echo "</tr>";
			}
			?>
			
		</tbody>
	</table>
</div>

<div class="modal fade" id="edit_cititor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">  <i class="fa fa-user text-primary"></i>Modifica cititor</h4>
  </div>     
    <div class="modal-body">         
                <form id="form_modifica_cititor" method="post" >
                <input type="hidden" name="ID" id="ID">
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Nume: </label>
						<input type="text" class="form-control" id="nume" name="nume">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Prenume: </label>
						<input type="text" class="form-control" id="prenume" name="prenume">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">CNP: </label>
						<input type="text" class="form-control" id="cnp" name="cnp">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Adresa: </label>
						<input type="text" class="form-control" ="adresa" name="adresa">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Numar de telefon: </label>
						<input type="text" class="form-control" id="numar_telefon" name="numar_telefon">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Email: </label>
						<input type="text" class="form-control" id="email" name="email">
					</div>
				</div>      
                 </form>
           </div>
           <div class="clearfix"></div>
           <div class="modal-footer">
                <button id = "save_cititor" class="btn btn-success" name="submit">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
    </div>
  </div>

<div class="spatiere">&nbsp;</div>
	<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('#example').DataTable();
		    $("#datepicker").datepicker();
		} );

	</script>
	</body>
</html>


<?php } ?>