$("document").ready(function () {
	$("#add_carte").click(function() {
		$( ".adaugare" ).slideToggle( "100");
	});
	$("#add_cititor").click(function() {
		$( ".adaugare_cititor" ).slideToggle( "100");
	});
	$("#imprumut_carte").click(function() {
		$( ".imprumut_carte" ).slideToggle( "100");
	});
	$("#returnare_carte").click(function() {

		$( ".returnare_carte" ).slideToggle( "100");
	});
	$(".confirma_stergere").click(function() {
		return confirm("Esti sigur ca vrei sa stergi cartea?");
	});

	$(".modifica").click(function() {
		var id = $(this).attr("id1");
		$.getJSON("/pages/functions.php?id="+id, function(data) {
			$("#ID").val(data.ID);
			$("#ISBN").val(data.ISBN);
			$("#nume_carte").val(data.nume_carte);
			$("#autor_carte").val(data.autor_carte);
			$("#data_publicare").val(data.data_publicare);
			$("#numar_pagini").val(data.numar_pagini);
			$("#perioada_returnare").val(data.perioada_returnare);
			$("#cantitate").val(data.cantitate);
			$("#categorie").val(data.categorie);
			$("#raft").val(data.raft);
		});
	});
	$("#save").on("click", function() {
		var conf = confirm("Esti sigur ca vrei sa modifici campurile?");
		if(conf == true)
		{
			$.ajax({
			url: "/pages/post.php",
			type: "post",
			data: $("#form_modifica").serialize(),
			success: function() {
				alert("Datele au fost modificate cu succes");
				window.location.href = 'http://localhost';
			},
			error: function(jqXHR, textStatus, errorThrown) {
           		alert("A aparut o eroare.");
        	}

		});
		}
		
	});
	$(".modifica_cititor").click(function() {
		var id = $(this).attr("id1");
		$.getJSON("/pages/functions2.php?id="+id, function(data) {
			$("#nume").val(data.nume);
			$("#prenume").val(data.prenume);
			$("#cnp").val(data.cnp);
			$("#adresa").val(data.adresa);
			$("#numar_telefon").val(data.numar_telefon);
			$("#email").val(data.email);
			
		});
	});
	$("#save_cititor").on("click", function() {
		var conf = confirm("Esti sigur ca vrei sa modifici campurile?");
		if(conf == true)
		{
			$.ajax({
			url: "/pages/post_carte.php",
			type: "post",
			data: $("#form_modifica").serialize(),
			success: function() {
				alert("Datele au fost modificate cu succes");
				window.location.href = 'http://localhost/cititori.php';
			},
			error: function(jqXHR, textStatus, errorThrown) {
           		alert("A aparut o eroare.");
        	}

		});
		}
		
	});	
});