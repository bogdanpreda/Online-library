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
$carti = $db->get_carti();
?>

<div class="container c1">
	<button id="add_carte" class="btn btn-primary">Adauga carte</button>
	<div class="adaugare">
		<form action="index.php?act=adauga" method="POST" class="form-inine" role="form">
				<div class="form-group">
					<legend>Adauga carte</legend>
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
						<label class="" for="">Autor: </label>
						<input type="text" class="form-control" name="autor_carte">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Data publicare: </label>
						<input type="text" class="form-control" name="data_publicare" placeholder="yyyy-mm-dd">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Numar pagini: </label>
						<input type="text" class="form-control" name="numar_pagini">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Perioada returnare: </label>
						<input type="text" class="form-control" name="perioada_returnare">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Cantitate: </label>
						<input type="text" class="form-control" name="cantitate">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Categorie: </label>
						<input type="text" class="form-control" name="categorie">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">	Raft:  </label>
						<input type="text" class="form-control" name="raft">
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
				<th>ISBN</th>
				<th>Nume carte</th>
				<th>Autor</th>
				<th>Data publicare</th>
				<th>Numar pagini</th>
				<th>Perioada returnare</th>
				<th>Cantitate</th>
				<th>Categorie</th>
				<th>Raft</th>
				<th>Optiuni</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($carti as $carte) {
				echo "<tr>";
				echo "<td>".$carte['ISBN']."</td>";
				echo "<td>".$carte['nume_carte']."</td>";
				echo "<td>".$carte['autor_carte']."</td>";
				echo "<td>".$carte['data_publicare']."</td>";
				echo "<td>".$carte['numar_pagini']."</td>";
				echo "<td>".$carte['perioada_returnare']."</td>";
				echo "<td>".$carte['cantitate']."</td>";
				echo "<td>".$carte['categorie']."</td>";
				echo "<td>".$carte['raft']."</td>";
				echo "<td>
					<button class='modifica btn btn-sm btn-primary' id1='{$carte['ID']}'  data-toggle='modal' data-target='#edit'><i class='glyphicon glyphicon-edit'></i></button>
					<a class='confirma_stergere' href='index.php?act=delete&id={$carte['ID']}'><button id='{$carte['ID']}' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-trash'></i></button></a>
				</td>";
				echo "</tr>";
			}
			?>
			
		</tbody>
	</table>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">  <i class="fa fa-user text-primary"></i>Modifica carte</h4>
  </div>     
    <div class="modal-body">         
                <form id="form_modifica" method="post" >
                <input type="hidden" name="ID" id="ID">
                <div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">ISBN: </label>
						<input type="text" class="form-control" id="ISBN" name="ISBN">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Nume carte: </label>
						<input type="text" class="form-control" id="nume_carte" name="nume_carte">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Autor: </label>
						<input type="text" class="form-control" id="autor_carte" name="autor_carte">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Data publicare: </label>
						<input type="text" class="form-control" id="data_publicare" name="data_publicare" placeholder="yyyy-mm-dd">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Numar pagini: </label>
						<input type="text" class="form-control" id="numar_pagini" name="numar_pagini">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Perioada returnare: </label>
						<input type="text" class="form-control" id="perioada_returnare" name="perioada_returnare">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Cantitate: </label>
						<input type="text" class="form-control" id="cantitate" name="cantitate">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">Categorie: </label>
						<input type="text" class="form-control" id="categorie" name="categorie">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="" for="">	Raft:  </label>
						<input type="text" class="form-control" id="raft" name="raft">
					</div>
				</div>

		
                         
                 </form>
           </div>
           <div class="clearfix"></div>
           <div class="modal-footer">
                <button id = "save" class="btn btn-success" name="submit">Save</button>
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